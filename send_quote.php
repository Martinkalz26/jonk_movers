<?php
// Prevent direct access
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: contact.html");
    exit;
}

// Set headers to return JSON
header('Content-Type: application/json');

// Email configuration
$to_email = "ssaazifrank6@gmail.com";
$from_email = "noreply@jonkmovers.ca";

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Initialize response array
$response = array();

// Get and sanitize form data
$customer_name = isset($_POST['Customer_Name']) ? sanitize_input($_POST['Customer_Name']) : '';
$customer_email = isset($_POST['Customer_Email']) ? sanitize_input($_POST['Customer_Email']) : '';
$contact_phone = isset($_POST['Contact_Phone']) ? sanitize_input($_POST['Contact_Phone']) : '';
$service_requested = isset($_POST['Service_Requested']) ? sanitize_input($_POST['Service_Requested']) : '';
$move_date = isset($_POST['Preferred_Move_Date']) ? sanitize_input($_POST['Preferred_Move_Date']) : 'Not specified';
$customer_message = isset($_POST['Customer_Message']) ? sanitize_input($_POST['Customer_Message']) : '';

// Honeypot check (spam protection)
if (!empty($_POST['_gotcha'])) {
    $response['success'] = false;
    $response['message'] = 'Spam detected.';
    echo json_encode($response);
    exit;
}

// Validation
$errors = array();

if (empty($customer_name) || strlen($customer_name) < 2) {
    $errors[] = "Please enter a valid name (at least 2 characters).";
}

if (empty($customer_email) || !validate_email($customer_email)) {
    $errors[] = "Please enter a valid email address.";
}

if (empty($contact_phone) || strlen($contact_phone) < 10) {
    $errors[] = "Please enter a valid phone number (at least 10 digits).";
}

if (empty($service_requested)) {
    $errors[] = "Please select a service type.";
}

if (empty($customer_message) || strlen($customer_message) < 10) {
    $errors[] = "Please enter a message (at least 10 characters).";
}

// If there are validation errors, return them
if (!empty($errors)) {
    $response['success'] = false;
    $response['errors'] = $errors;
    echo json_encode($response);
    exit;
}

// Format the move date nicely
if ($move_date != 'Not specified') {
    $date_obj = DateTime::createFromFormat('Y-m-d', $move_date);
    if ($date_obj) {
        $move_date = $date_obj->format('F j, Y');
    }
}

// Email subject
$subject = "🚚 New Moving Quote Request - Jonk Movers Inc.";

// Create HTML email body
$html_message = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #1E3A8A 0%, #0F172A 100%); color: white; padding: 30px 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 28px; }
        .header p { margin: 10px 0 0 0; font-size: 14px; opacity: 0.9; }
        .content { background: #ffffff; padding: 30px; border: 1px solid #e5e7eb; }
        .field { margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #f1f5f9; }
        .field:last-child { border-bottom: none; }
        .label { font-weight: bold; color: #1E3A8A; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px; }
        .value { font-size: 16px; color: #334155; margin-top: 5px; }
        .message-box { background: #f8fafc; padding: 15px; border-left: 4px solid #2563EB; border-radius: 4px; margin-top: 5px; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #64748b; border-radius: 0 0 8px 8px; }
        .footer a { color: #2563EB; text-decoration: none; }
        .divider { height: 2px; background: linear-gradient(to right, #2563EB, #F59E0B); margin: 20px 0; }
        .icon { font-size: 18px; margin-right: 8px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>🚚 New Quote Request</h1>
            <p>Jonk Movers Inc. - Toronto</p>
        </div>
        
        <div class='content'>
            <div class='field'>
                <div class='label'>👤 Customer Name</div>
                <div class='value'>{$customer_name}</div>
            </div>
            
            <div class='field'>
                <div class='label'>📧 Email Address</div>
                <div class='value'><a href='mailto:{$customer_email}'>{$customer_email}</a></div>
            </div>
            
            <div class='field'>
                <div class='label'>📱 Phone Number</div>
                <div class='value'><a href='tel:{$contact_phone}'>{$contact_phone}</a></div>
            </div>
            
            <div class='divider'></div>
            
            <div class='field'>
                <div class='label'>🏠 Service Requested</div>
                <div class='value'>{$service_requested}</div>
            </div>
            
            <div class='field'>
                <div class='label'>📅 Preferred Move Date</div>
                <div class='value'>{$move_date}</div>
            </div>
            
            <div class='field'>
                <div class='label'>💬 Customer Message</div>
                <div class='message-box'>{$customer_message}</div>
            </div>
        </div>
        
        <div class='footer'>
            <p><strong>Jonk Movers Inc.</strong></p>
            <p>87 Jameson Avenue, Toronto, Ontario, Canada</p>
            <p>📞 +1 (437) 452-1402 | +1 (647) 633-8660</p>
            <p>📧 <a href='mailto:ssaazifrank6@gmail.com'>ssaazifrank6@gmail.com</a></p>
            <p style='margin-top: 15px; padding-top: 15px; border-top: 1px solid #e5e7eb;'>
                <em>This quote request was submitted on " . date('F j, Y \a\t g:i A') . "</em>
            </p>
        </div>
    </div>
</body>
</html>
";

// Plain text version for email clients that don't support HTML
$plain_message = "
NEW MOVING QUOTE REQUEST - JONK MOVERS INC.
=============================================

Customer Name:         {$customer_name}
Email:                 {$customer_email}
Phone:                 {$contact_phone}

Service Requested:     {$service_requested}
Preferred Move Date:   {$move_date}

Customer Message:
-----------------
{$customer_message}

=============================================
Submitted: " . date('F j, Y \a\t g:i A') . "
=============================================

Jonk Movers Inc.
87 Jameson Avenue, Toronto, Ontario, Canada
Phone: +1 (437) 452-1402 | +1 (647) 633-8660
Email: ssaazifrank6@gmail.com
";

// Email headers
$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-Type: text/html; charset=UTF-8";
$headers[] = "From: Jonk Movers Contact Form <{$from_email}>";
$headers[] = "Reply-To: {$customer_name} <{$customer_email}>";
$headers[] = "X-Mailer: PHP/" . phpversion();
$headers[] = "X-Priority: 1";
$headers[] = "Importance: High";

// Additional headers for better deliverability
$headers[] = "Return-Path: {$from_email}";
$headers[] = "Organization: Jonk Movers Inc.";

// Send email
$mail_sent = mail($to_email, $subject, $html_message, implode("\r\n", $headers));

if ($mail_sent) {
    // Success response
    $response['success'] = true;
    $response['message'] = 'Thank you for contacting us! We\'ll get back to you within 24 hours.';
    
    // Optional: Send auto-reply to customer
    $customer_subject = "Thank you for contacting Jonk Movers Inc.";
    $customer_message_html = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #1E3A8A 0%, #0F172A 100%); color: white; padding: 30px 20px; text-align: center; border-radius: 8px 8px 0 0; }
            .content { background: #ffffff; padding: 30px; border: 1px solid #e5e7eb; }
            .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #64748b; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>🚚 Thank You!</h1>
                <p>Jonk Movers Inc.</p>
            </div>
            <div class='content'>
                <p>Dear {$customer_name},</p>
                <p>Thank you for contacting Jonk Movers Inc.! We've received your quote request and will get back to you within 24 hours.</p>
                <p><strong>What happens next?</strong></p>
                <ul>
                    <li>Our team will review your requirements</li>
                    <li>We'll prepare a customized quote for you</li>
                    <li>You'll receive a call or email with full details</li>
                </ul>
                <p>If you have any urgent questions, feel free to call us directly at:</p>
                <p style='font-size: 18px; color: #2563EB;'>
                    📞 <strong>+1 (437) 452-1402</strong> or <strong>+1 (647) 633-8660</strong>
                </p>
                <p>We look forward to making your move stress-free!</p>
                <p>Best regards,<br><strong>The Jonk Movers Team</strong></p>
            </div>
            <div class='footer'>
                <p><strong>Jonk Movers Inc.</strong></p>
                <p>87 Jameson Avenue, Toronto, Ontario, Canada</p>
                <p>📧 ssaazifrank6@gmail.com</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $customer_headers = array();
    $customer_headers[] = "MIME-Version: 1.0";
    $customer_headers[] = "Content-Type: text/html; charset=UTF-8";
    $customer_headers[] = "From: Jonk Movers Inc. <{$from_email}>";
    $customer_headers[] = "Reply-To: Jonk Movers Inc. <{$to_email}>";
    
    mail($customer_email, $customer_subject, $customer_message_html, implode("\r\n", $customer_headers));
    
} else {
    // Error response
    $response['success'] = false;
    $response['message'] = 'Sorry, there was an error sending your message. Please call us directly at +1 (437) 452-1402';
}

echo json_encode($response);
?>
