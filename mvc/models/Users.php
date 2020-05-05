<?php
/**
 * Users model class
 */
class Users
{
      public static function getUser($email, $password)
      {

            $db = Db::getConnection();
            $password = base64_encode($password);          

            $sql = 'SELECT id FROM users WHERE email = :email AND password = :password';

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            $result->execute();

            $user = $result->fetchAll(PDO::FETCH_ASSOC);
            if ($user) {
                  return $user[0]['id'];
            }
            return false;
      }

      public static function createUser(array $credentials)
      {
            $db = Db::getConnection();
            $credentials['password'] = base64_encode($credentials['password']);
            $query = "INSERT INTO users 
                                   (firstname, lastname, email, password) 
                             VALUES
                                     (:firstname ,:lastname ,:email, :password)";
            $sql = $db->prepare($query);
            $sql->bindParam(':firstname', $credentials['firstname']);
            $sql->bindParam(':lastname', $credentials['lastname']);
            $sql->bindParam(':email', $credentials['email']);
            $sql->bindParam(':password', $credentials['password']);
            $sql->execute();
            return $db->lastInsertId();
      }
            /**
             * get User by id
             *
             * @param integer $id
             * @return mixed
             */
      public static function getUserById(int $id)
      {

            $db = Db::getConnection();
            $sql = 'SELECT users.firstname, users.lastname, users.email, users.password, image_upload.image_path AS path  FROM users
                    LEFT  JOIN image_upload
                          ON  users.id = image_upload.user_id
                     WHERE users.id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
      }

      public static function uploadPhoto($userId, $image_path)
      {

            $db = Db::getConnection();
            $sql = "INSERT INTO `image_upload` ( `user_id`, `image_path`) VALUES (:user_id, :image_path)";
            $result = $db->prepare($sql);
            $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $result->bindParam(':image_path', $image_path, PDO::PARAM_STR);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->execute();
      }
      
 


      public static function checkName($name)
      {
            if (strlen($name) >= 2) {
                  return true;
            }
            return false;
      }

      public static function checkPassword($password)
      {
            if (strlen($password) >= 5) {
                  return true;
            }
            return false;
      }
}
