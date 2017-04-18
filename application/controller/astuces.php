<?php

/**
 * Class Astuces
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Astuces extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/astuces/index
     */
    public function index()
    {
        // getting all astuces and amount of astuces
        $astuces = $this->model->getAllAstuces();
        $amount_of_astuces = $this->model->getAmountOfAstuces();

       // load views. within the views we can echo out $astuces and $amount_of_astuces easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/astuces/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addAstuce
     * This method handles what happens when you move to http://yourproject/astuces/addAstuce
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a Astuce" form on astuces/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to astuces/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addAstuce()
    {

        // if we have POST data to create a new Astuce entry
        if (isset($_POST["submit_add_astuce"])) {
            // do addAstuce() in model/model.php

            $this->model->addAstuce($_POST["title"], $_POST["body"],  $_POST["link"]);
        }

        // where to go after Astuce has been added
        header('location: ' . URL . 'astuces/index');
    }

    /**
     * ACTION: deleteAstuce
     * This method handles what happens when you move to http://yourproject/astuces/deleteAstuce
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a Astuce" button on astuces/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to astuces/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $Astuce_id Id of the to-delete Astuce
     */
    public function deleteAstuce($astuce_id)
    {
        // if we have an id of a astuce that should be deleted
        if (isset($astuce_id)) {
            // do deleteAstuce() in model/model.php
            $this->model->deleteAstuce($astuce_id);
        }

        // where to go after astuce has been deleted
        header('location: ' . URL . 'astuces/index');
    }

     /**
     * ACTION: editAstuce
     * This method handles what happens when you move to http://yourproject/astuces/editastuce
     * @param int $astuce_id Id of the to-edit astuce
     */
    public function editAstuce($astuce_id)
    {
        // if we have an id of a astuce that should be edited
        if (isset($astuce_id)) {
            // do getAstuce() in model/model.php
            $astuce = $this->model->getAstuce($astuce_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $astuce easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/astuces/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to astuces index page (as we don't have a astuce_id)
            header('location: ' . URL . 'astuces/index');
        }
    }
    
    /**
     * ACTION: updateAstuce
     * This method handles what happens when you move to http://yourproject/astuces/updateastuce
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a astuce" form on astuces/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to astuces/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateAstuce()
    {
        // if we have POST data to create a new astuce entry
        if (isset($_POST["submit_update_astuce"])) {
            // do updateAstuce() from model/model.php
            $this->model->updateAstuce($_POST["title"], $_POST["body"],  $_POST["link"], $_POST['astuce_id']);
        }

        // where to go after astuce has been added
        header('location: ' . URL . 'astuces/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentation
     */
    public function ajaxGetStats()
    {
        $amount_of_astuces = $this->model->getAmountOfAstuces();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_astuces;
    }

}
