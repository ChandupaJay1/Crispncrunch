<?php

/**
 * Quote Controller
 */
class QuoteController extends Controller
{
    protected static string $view = 'pages/quote';
    protected static string $page = "quote";
    protected static string $title = "Quote";


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
