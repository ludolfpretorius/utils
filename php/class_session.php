<?php
    
    class Session {
        
        public function create() {
            session_start(); // Session expiry set in php.ini
            $_SESSION['id'] = session_id();
            $_SESSION['created'] = time();
            $_SESSION['updated'] = time();
            $_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
        }

        public function isValid() {
            session_start();
            if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR']) {
                $this->destroy(true);
                return false;
            }
            if ($_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT']) {
                $this->destroy(true);
                return false;
            }
            if (!isset($_SESSION['id'])) {
                $this->destroy(true);
                return false;
            }
            if ($_SESSION['id'] !== session_id()) {
                $this->destroy(true);
                return false;
            }
            return true;
        }

        public function update() {
            session_regenerate_id(false);
            $_SESSION['id'] = session_id();
            $_SESSION['updated'] = time();

            $params = session_get_cookie_params();
            $oneDay = time() + 86400;
            setcookie(
                session_name(),
                session_id(),
                [
                    'expires' => $oneDay,
                    'path' => $params['path'],
                    'domain' => $params['domain'],
                    'secure' => $params['secure'],
                    'httponly' => isset($params['httponly']),
                    'samesite' => 'None',
                ]
            );
        }

        public function destroy($cookie = false) {
            session_unset(); // unset $_SESSION variable for the run-time 
            session_destroy(); // destroy session data in storage
            if ($cookie) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    [
                        'expires' => 0,
                        'path' => $params['path'],
                        'domain' => $params['domain'],
                        'secure' => $params['secure'],
                        'httponly' => isset($params['httponly']),
                        'samesite' => 'None',
                    ]
                );
            }
        }
    }