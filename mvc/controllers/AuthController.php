<?php

/**AuthController
 * 
 */

class AuthController extends AdminBase
{
    /**
     * login Action
     *
     * @return boolean
     */
    public function actionLogin()
    {
        $email = false;
        $password = false;
        if (isset($_POST['submit'])) {
            $email = htmlspecialchars($_POST['email'], ENT_HTML5);
            $password = htmlspecialchars($_POST['password'], ENT_HTML5);

            $errors = false;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erros[] = 'Invalid Email';
            }

            if (!Users::checkPassword($password)) {
                $errors[] = 'Invalid Password';
            }

            $userId = Users::getUser($email, $password);
            if ($userId == false) {

                $errors[] = 'Invalid email or password';
            } else {
                
                SessionHelper::auth($userId);

                header("Location: /admin/index");
            }
        }


        require_once(ROOT . '/views/auth/login.php');
        return true;
    }
    /**
     * register Action
     *
     * @return boolean
     */
    public function actionRegister()
    {
        $credentials = false;


        if (isset($_POST['submit'])) {
            $credentials['firstname'] = htmlspecialchars($_POST['firstname'], ENT_HTML5);
            $credentials['lastname'] = htmlspecialchars($_POST['lastname'], ENT_HTML5);
            $credentials['email']  = htmlspecialchars($_POST['email'], ENT_HTML5);
            $credentials['password']  = htmlspecialchars($_POST['password'], ENT_HTML5);
            $errors = false;
            $userId = false;

            if (!Users::checkName($credentials['firstname'])) {
                $errors[] = 'Invalid firstname ';
            }
            if (!Users::checkName($credentials['lastname'])) {
                $errors[] = 'Invalid lastname ';
            }

            if (!Users::checkPassword($credentials['password'])) {
                $errors[] = 'Invalid Password length';
            }

            if (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
                $erros[] = 'Invalid Input Email';
            }

            if ($errors == false) {
                $userId = Users::createUser($credentials);
            }

            $imageUpload  = new ImageUpload();
            $imageUpload->load($_FILES);
            if (!$imageUpload->upload($userId)) {
                $errors = array_merge($errors, $imageUpload->getErrors());
            }

            if ($userId == false) {

                $errors[] = 'Invalid register data';
            } else {
                SessionHelper::auth($userId);
                header("Location: /admin/index");
            }
        }

        require_once(ROOT . '/views/auth/register.php');
        return true;
    }

    /**
     * @return void Redirect to login form
     */
    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /home/login");
    }
}
