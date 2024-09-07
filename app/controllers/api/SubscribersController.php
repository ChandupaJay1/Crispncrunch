<?php

class SubscribersController extends Controller
{
    /**
     * @throws Exception
     */
    public function store(): never
    {
        $req = json_decode(file_get_contents("php://input"));
        $email = $req->email;
        if (!Validator::email($email)) {
            exit_with(["success" => false, "id" => 0, "msg" => 'Invalid email']);
        }
        $msg = 'Subscribed';
        $emailModel = new Email();
        $emailExists = $emailModel->isExists(["email" => $email]);
        if (!$emailExists) {
            $emailId = $emailModel->insert(["email" => $email]);
        } else {
            $emailId = $emailModel->selectOne(["email" => $email], ['id'])->id;
        }
        $subscriberModel = new Subscriber();
        $subscribed = $subscriberModel->isExists(['emails_id' => $emailId]);
        $id = 0;
        if (!$subscribed) {
            $id = $subscriberModel->insert(["emails_id" => $emailId]);
            if ($id <= 0) {
                $msg = "Something went wrong!";
            }
        } else {
            $msg = "Already subscribed";
        }
        $success = $id > 0;
        exit_with(["success" => $success, "id" => $id, 'msg' => $msg]);
    }
}
