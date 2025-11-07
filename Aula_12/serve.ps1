# Simple static file server using .NET HttpListener
Add-Type -AssemblyName System.Net

$prefix = "http://localhost:8000/"
$listener = New-Object System.Net.HttpListener
$listener.Prefixes.Add($prefix)
$listener.Start()

Write-Host "Servindo $pwd em $prefix" -ForegroundColor Green

try {
    while ($true) {
        $context = $listener.GetContext()
        $request = $context.Request
        $response = $context.Response

        $localPath = $request.Url.LocalPath.TrimStart('/').Replace('/', '\\')
        if ([string]::IsNullOrWhiteSpace($localPath)) { $localPath = 'index.html' }
        $fullPath = Join-Path (Get-Location) $localPath

        if ((Test-Path $fullPath) -and -not (Get-Item $fullPath).PSIsContainer) {
            $bytes = [System.IO.File]::ReadAllBytes($fullPath)
            # Very basic content-type detection
            $ext = [System.IO.Path]::GetExtension($fullPath).ToLower()
            switch ($ext) {
                '.html' { $response.ContentType = 'text/html' }
                '.css'  { $response.ContentType = 'text/css' }
                '.js'   { $response.ContentType = 'application/javascript' }
                '.json' { $response.ContentType = 'application/json' }
                '.png'  { $response.ContentType = 'image/png' }
                '.jpg'  { $response.ContentType = 'image/jpeg' }
                '.jpeg' { $response.ContentType = 'image/jpeg' }
                '.svg'  { $response.ContentType = 'image/svg+xml' }
                default { $response.ContentType = 'application/octet-stream' }
            }
            $response.OutputStream.Write($bytes, 0, $bytes.Length)
        } else {
            $response.StatusCode = 404
            $msg = "Arquivo não encontrado: $localPath"
            $bytes = [System.Text.Encoding]::UTF8.GetBytes($msg)
            $response.OutputStream.Write($bytes, 0, $bytes.Length)
        }
        $response.OutputStream.Close()
    }
}
finally {
    $listener.Stop()
    $listener.Close()
}