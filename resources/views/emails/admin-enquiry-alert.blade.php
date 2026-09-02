<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; background:#f4f4f4; padding:24px;">
    <div style="max-width:560px;margin:0 auto;background:#fff;border-radius:8px;overflow:hidden;border:1px solid #e5e5e5;">
        <div style="background:#00a2d3;padding:20px 24px;">
            <h2 style="color:#fff;margin:0;font-size:18px;">New Enquiry Received</h2>
            <p style="color:#e6f7ff;margin:4px 0 0;font-size:14px;">{{ $formName }}</p>
        </div>
        <div style="padding:24px;">
            <table style="width:100%;border-collapse:collapse;">
                @foreach ($fields as $label => $value)
                    <tr>
                        <td style="padding:8px 0;font-weight:bold;color:#333;width:35%;vertical-align:top;font-size:14px;">
                            {{ $label }}
                        </td>
                        <td style="padding:8px 0;color:#555;font-size:14px;">
                            {{ is_array($value) ? implode(', ', $value) : ($value ?: '—') }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div style="padding:16px 24px;background:#fafafa;border-top:1px solid #eee;">
            <p style="margin:0;font-size:12px;color:#999;">Submitted on {{ now()->format('d M Y, h:i A') }} via Fitway website.</p>
        </div>
    </div>
</body>
</html>