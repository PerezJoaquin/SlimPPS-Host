<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require 'vendor/autoload.php';
    require 'Clases/Personas.php';

    $app = new \Slim\App;

    $app->post('/login', function ($req, $res, $args) {
        $perConst = new Persona();
        $perConst->SetNombre($req->getParam('nombre'));
        $perConst->SetDni($req->getParam('dni'));

        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::Logear($perConst)
            )
        );
    });

    //http://localhost:8080/PPS/index.php/personas    
    $app->get('/personas', function ($req, $res, $args) {
        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::TraerTodasLasPersonas()
            )
        );        
    });

    //http://localhost:8080/PPS/index.php/persona/1
    $app->get('/persona/{id}', function ($req, $res, $args) {

        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::TraerUnaPersona($args['id'])
            )
        );
    });

    //http://localhost:8080/PPS/index.php/persona/borrar/3
    $app->delete('/persona/borrar/{id}', function ($req, $res, $args) {        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::BorrarPersona($args['id'])
            )
        );
    });

    //http://localhost:8080/PPS/index.php/persona/guardar?nombre=Juan&apellido=Pedro&dni=1515
    $app->post('/persona/guardar', function ($req, $res) {
        $perConst = new Persona();
        $perConst->SetNombre($req->getParam('nombre'));
        $perConst->SetApellido($req->getParam('apellido'));
        $perConst->SetDni($req->getParam('dni'));
        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::InsertarPersona($perConst)
            )
        );
    });

    //http://localhost:8080/PPS/index.php/persona/modificar?id=5&nombre=Julio&apellido=Pedro
    $app->put('/persona/modificar', function ($req, $res) {
        $perConst = new Persona();
        $perConst->SetId($req->getParam('id'));
        $perConst->SetNombre($req->getParam('nombre'));
        $perConst->SetApellido($req->getParam('apellido'));
        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::ModificarPersona($perConst)
            )
        );
    });

    $app->run();