<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/ISupplierRepository.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Business/Suppliers/ListSupplierService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Business/Suppliers/SaveSupplierService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Business/Suppliers/SearchSupplierService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Business/Suppliers/UpdateSupplierService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Business/Suppliers/DeleteSupplierService.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Infrastructure/Repository/SupplierRepository.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Exceptions/EntityExistsException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Exceptions/EntityNotFoundException.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

class SupplierController 
{
    private $supplierRepository;

    public function __construct(ISupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function ExecuteAction() : void
    {
        $action = mb_strtoupper(trim($_REQUEST["action"]));
        switch ($action)
        {
            case "GUARDAR":
                $this->SaveSupplier();
                break;

            case "LISTAR":
                $this->ListAllSuppliers();
                break;

            case "BUSCAR":
                $this->SearchSupplier();
                break;

            case "EDIT":
                $this->SearchEditSupplier();
                break;

            case "ACTUALIZAR":
                $this->UpdateSupplier();
                break;

            case "DELETE":
                $this->DeleteSupplier();
                break;

            case "LOGIN":
                $this->LoginSupplier();
                break;

            case "LOGOUT":
                $this->LogoutSupplier();
                break;

            default:
                header("Location: ../Views/Forms/Error.php?message=Accion No Permitida");
                exit;
        }
    }

    public function SaveSupplier(): void
    {
        try
        {
            $code = $_POST["code"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $contact = $_POST["contact"];
            $phone = $_POST["phone"];
            $direction = $_POST["direction"];
            $city = $_POST["city"];
            $country = $_POST["country"];
            $password = $_POST["password"];

            $supplierModel = new SupplierModel($code, $name, $email, $contact, $phone, $direction, $city, $country, $password);

            $saveSupplierService = new SaveSupplierService($this->supplierRepository);
            $total = $saveSupplierService->SaveSupplier($supplierModel);

            $message = "Proveedor Guardado, Total: $total";
            header("Location: ../Views/Forms/Suppliers/Create.php?message=$message");
        }
        catch (Exception $e)
        {
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Suppliers/Create.php?message=$message");
        }
    }

    public function ListAllSuppliers() : void
    {
        try
        {
            $listSupplierService = new ListSupplierService($this->supplierRepository);
            $suppliers = $listSupplierService->ListSuppliers();
            $total = count($suppliers);
            if ($total > 0) {
                $serializeSuppliers = serialize($suppliers);
                $_SESSION["suppliers.all"] = $serializeSuppliers;
                $message = "Total Proveedores: $total";
            } else {
                $_SESSION["suppliers.all"] = null;
                $message = "Total Proveedores: 0";
            }
            header("Location: ../Views/Forms/Suppliers/List.php?message=$message");
        }
        catch(Exception $e)
        {
            $_SESSION["suppliers.all"] = null;
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Suppliers/List.php?message=$message");
        }
    }

    public function SearchSupplier(){
        try
        {
            $code = $_POST["code"];

            $searchSupplierService = new SearchSupplierService($this->supplierRepository);
            $supplierModel = $searchSupplierService->SearchSupplier($code);

            $_SESSION["supplier.find"] = serialize($supplierModel);
            $message = "Proveedor Encontrado";
            header("Location: ../Views/Forms/Suppliers/Search.php?message=$message");
        }
        catch(Exception $e)
        {
            $_SESSION["supplier.find"] = null;
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Suppliers/Search.php?message=$message");
        }
    }

    public function SearchEditSupplier(){
        try
        {
            $code = $_GET["code"];

            $searchSupplierService = new SearchSupplierService($this->supplierRepository);
            $supplierModel = $searchSupplierService->SearchSupplier($code);

            $_SESSION["supplier.find"] = serialize($supplierModel);
            $message = "Proveedor Encontrado";
            header("Location: ../Views/Forms/Suppliers/Edit.php?message=$message");
        }
        catch(Exception $e)
        {
            $_SESSION["supplier.find"] = null;
            $message = $e->getMessage();
            header("Location: SupplierController.php?action=Listar");
        }
    }
    
    public function UpdateSupplier()
    {
        try 
        {
            $code = $_POST["code"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $contact = $_POST["contact"];
            $phone = $_POST["phone"];
            $direction = $_POST["direction"];
            $city = $_POST["city"];
            $country = $_POST["country"];
            $password = $_POST["password"];

            $supplierModel = new SupplierModel($code, $name, $email, $contact, $phone, $direction, $city, $country, $password);

            $updateSupplierService = new UpdateSupplierService($this->supplierRepository);
            $updateSupplierService->UpdateSupplier($supplierModel);

            $_SESSION["supplier.find"] = serialize($supplierModel);;
            $message = "Proveedor actualizado";
            header("Location: ../Views/Forms/Suppliers/Edit.php?message=$message");
        } 
        catch (Exception $e) 
        {
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Suppliers/Edit.php?message=$message");
        }
    }

    public function DeleteSupplier()
    {
        try 
        {
            $code = $_GET["code"];

            $deleteSupplierService = new DeleteSupplierService($this->supplierRepository);
            $deleteSupplierService->DeleteSupplier($code);

            header("Location: SupplierController.php?action=Listar");
        } 
        catch (Exception $e) 
        {
            header("Location: SupplierController.php?action=Listar");
        }
    }

    public function LoginSupplier()
    {
        try
        {
            $code = $_POST["code"];
            $password = $_POST["password"];

            $searchSupplierService = new SearchSupplierService($this->supplierRepository);
            $supplierModel = $searchSupplierService->SearchSupplier($code);

            if ($supplierModel->getPassword() == $password) {
                $login = serialize($supplierModel);
                $_SESSION["supplier.login"] = $login;
                header("Location: ../Views/Forms/Suppliers/index.php");
                exit;
            } else {
                $_SESSION["supplier.login"] = null;
                header("Location: ../Views/Forms/Suppliers/Login.php?message=Contraseña Incorrecta");
                exit;
            }
        }
        catch(Exception $ex)
        {
            $message = $ex->getMessage();
            $_SESSION["supplier.login"] = null;
            header("Location: ../Views/Forms/Suppliers/Login.php?message=$message");
            exit;
        }
    }

    public function LogoutSupplier()
    {
        $_SESSION["supplier.login"] = null;
        header("Location: ../Views/Forms/Suppliers/Login.php");
    }

}

$supplierRepository = new SupplierRepository();
$controller = new SupplierController($supplierRepository);
$controller->ExecuteAction();