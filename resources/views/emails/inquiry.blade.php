<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { background: #f8f9fa; padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
        .content { padding: 20px 0; }
        .label { font-weight: bold; width: 150px; display: inline-block; }
        .footer { font-size: 12px; color: #777; margin-top: 20px; border-top: 1px solid #eee; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Inquiry Received</h2>
        </div>
        <div class="content">
            <p>You have received a new inquiry from the website contact form.</p>
            
            <p><span class="label">Name:</span> {{ $data['name'] }}</p>
            <p><span class="label">Email:</span> {{ $data['email'] }}</p>
            <p><span class="label">Mobile:</span> {{ $data['mobile'] }}</p>
            <p><span class="label">Subject:</span> {{ $data['subject'] }}</p>
            
            @if(isset($data['description']))
            <p><span class="label">Message:</span></p>
            <div style="background: #f9f9f9; padding: 10px; border-left: 3px solid #007bff;">
                {!! nl2br(e($data['description'])) !!}
            </div>
            @endif

            <p><span class="label">Page URL:</span> <a href="{{ $data['page_url'] }}">{{ $data['page_url'] }}</a></p>
        </div>
        <div class="footer">
            <p>This email was sent from {{ config('app.name') }} website.</p>
        </div>
    </div>
</body>
</html>
