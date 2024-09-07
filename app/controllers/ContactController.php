<?php

/**
 * Contact Controller
 */
class ContactController extends Controller
{
//    protected static array $data = [
//        'title' => 'Contact Us',
//        'page' => 'contact',
//    ];
    protected static string $view = 'pages/contact';
    protected static string $page = "contact";
    protected static string $title = "Contact Us";


    /**
     * @return View|string
     */
    public function index(): View|string
    {
        return new View(self::$view, static::$page, static::$title);
    }

    /**
     * @throws Exception
     */
    public function submit(): never
    {
        $data = json_decode(file_get_contents('php://input'));
        $body = $this->template('contact_email', $data);
        $success = sendContactForm($data->email, $data->subject, $body);
        $errors = [];
        if (!$success) {
            $errors = ["internal" => "Cannot send email"];
        }
        exit_with(["success" => $success, 'errors' => $errors]);
    }
}
