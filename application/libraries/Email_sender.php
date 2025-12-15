<?php
// We define the class named after the file.
class Email_sender {

    /**
     * Loads PHPMailer and sends an email.
     * * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param string $body Email body (HTML)
     * @param array $attachments Array of file paths for attachments
     * @return bool True on success, false on error
     */
    public function send_email($to, $subject, $body, $attachments = [])
    {
        // 1. Manually include the PHPMailer files
        $lib_path = APPPATH . 'libraries/PHPMailer/';
        require_once($lib_path . 'Exception.php');
        require_once($lib_path . 'PHPMailer.php');
        require_once($lib_path . 'SMTP.php');
        
        // 2. Use the imported classes with their full namespaces
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'auzenworksy@gmail.com';
            $mail->Password = 'oucw pvoy cbyw vjmw'; 
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('auzenworksy@gmail.com', 'Auzenworksy Support');
            $mail->addAddress($to);

            // Attachments
            foreach ($attachments as $filePath) {
                $mail->addAttachment($filePath);
            }

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            return $mail->send();
            
        } catch (PHPMailer\PHPMailer\Exception $e) {
            // CI3 logging
            log_message('error', 'Mailer Error: ' . $mail->ErrorInfo); 
            return false;
        }
    }
}