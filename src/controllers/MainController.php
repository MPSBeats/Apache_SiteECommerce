<?php

class MainController
{
    // Page d'accueil
    public function home()
    {
        $this->render('home');
    }

    // Page "Catalogue"
    public function catalogue()
    {
        $this->render('catalogue');
    }
    // Page "Login"
    public function login()
    {
        $this->render('login');
    }
    // Page "Register"
    public function register()
    {
        $this->render('register');
    }
    // Page "Panier"
    public function panier()
    {
        $this->render('panier');
    }
    // Page "Infos"
    public function infos()
    {
        $this->render('infos');
    }
    // Page 404
    public function notFound()
    {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }

    // Méthode pour inclure une vue
    private function render($view, $data = [])
    {
        // Transmet les données aux vues
        extract($data);

        // Inclut la vue demandée
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once __DIR__ . '/../views/partials/header.php';
            require_once $viewFile;
            require_once __DIR__ . '/../views/partials/footer.php';
        } else {
            echo "View not found: $view";
        }
    }
}
