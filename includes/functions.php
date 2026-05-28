<?php
include "../config/conectar_db.php";

function cadastroUsuario($nome_usuario, $sobrenome_usuario, $nascimento_usuario, $senha_usuario, $email_usuario){
    $conectar = conectar_db();
    $senha_criptografada = password_hash($senha_usuario, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario(nome_usuario, sobrenome_usuario, nascimento_usuario, senha_usuario, email_usuario) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nome_usuario, $sobrenome_usuario, $nascimento_usuario, $senha_criptografada, $email_usuario);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function cadastroAdmin($nome_admin, $sobrenome_admin, $nascimento_admin, $senha_admin, $email_admin){
    $conectar = conectar_db();                                                      
    $senha_criptografada = password_hash($senha_admin, PASSWORD_DEFAULT);
    $sql = "INSERT INTO administrador(nome_admin, sobrenome_admin, nascimento_admin, senha_admin, email_admin) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nome_admin, $sobrenome_admin, $nascimento_admin, $senha_criptografada, $email_admin);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function atualizarTokenUsuario($id_usuario, $token_usuario) {
    $conectar = conectar_db(); 
    $sql_atualizar = "UPDATE usuario SET token_usuario = ? WHERE id_usuario = ?";
    $stmt_atualizar = mysqli_prepare($conectar, $sql_atualizar);
    mysqli_stmt_bind_param($stmt_atualizar, "si", $token_usuario, $id_usuario);
    $ret = false;
    if (mysqli_stmt_execute($stmt_atualizar)) {
        $ret = true;
    }
    mysqli_stmt_close($stmt_atualizar);
    
    $sql_selecionar = "SELECT nome_usuario, sobrenome_usuario FROM usuario WHERE id_usuario = ?";
    $stmt_selecionar = mysqli_prepare($conectar, $sql_selecionar);
    mysqli_stmt_bind_param($stmt_selecionar, "i", $id_usuario);
    mysqli_stmt_execute($stmt_selecionar);
    mysqli_stmt_bind_result($stmt_selecionar, $nome_usuario, $sobrenome_usuario);
    mysqli_stmt_close($stmt_selecionar);
    mysqli_close($conectar);
    return $ret;
}

function checkarLoginUsuario($email_usuario, $senha_usuario){
    $conectar = conectar_db(); 
    $sql = "SELECT id_usuario, nome_usuario, sobrenome_usuario, nascimento_usuario, senha_usuario, email_usuario FROM usuario WHERE email_usuario = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email_usuario);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($result);
        if(password_verify($senha_usuario, $usuario["senha_usuario"])){
            mysqli_close($conectar);
            unset($usuario["senha_usuario"]);
            $usuario["token_usuario"] = bin2hex(random_bytes(32));
            atualizarTokenUsuario($usuario["id_usuario"], $usuario["token_usuario"]);
            return $usuario;
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return false;
}

function atualizarTokenAdmin($id_admin, $token_admin){
    $conectar = conectar_db(); 
    $sql_atualizar = "UPDATE administrador SET token_admin = ? WHERE id_admin = ?";
    $stmt_atualizar = mysqli_prepare($conectar, $sql_atualizar);
    mysqli_stmt_bind_param($stmt_atualizar, "si", $token_admin, $id_admin);
    $ret = false;
    if(mysqli_stmt_execute($stmt_atualizar)){
        $ret = true;
    }
    mysqli_stmt_close($stmt_atualizar);

    $sql_selecionar = "SELECT nome_admin, sobrenome_admin FROM administrador WHERE id_admin = ?";
    $stmt_selecionar = mysqli_prepare($conectar, $sql_selecionar);
    mysqli_stmt_bind_param($stmt_selecionar, "i", $id_admin);
    mysqli_stmt_execute($stmt_selecionar);
    mysqli_stmt_bind_result($stmt_selecionar, $nome_admin, $sobrenome_admin);
    mysqli_stmt_close($stmt_selecionar);
    mysqli_close($conectar);
    return $ret;
}

function checkarLoginAdmin($email_admin, $senha_admin){
    $conectar = conectar_db(); 
    $sql = "SELECT id_admin, nome_admin, sobrenome_admin, nascimento_admin, senha_admin, email_admin FROM administrador WHERE email_admin = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email_admin);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_assoc($result);
        if(password_verify($senha_admin, $admin["senha_admin"])){
            mysqli_close($conectar);
            unset($admin["senha_admin"]);
            $admin["token_admin"] = bin2hex(random_bytes(32));
            atualizarTokenAdmin($admin["id_admin"], $admin["token_admin"]);
            return $admin;
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return false;
}

function buscarTokenUsuario($token_usuario){
    $conectar = conectar_db(); 
    $sql = "SELECT id_usuario, nome_usuario, sobrenome_usuario, nascimento_usuario, email_usuario, token_usuario from usuario where token_usuario = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"s",$token_usuario);
    $usuario = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $usuario;
}

function buscarTokenAdministrador($token_admin){
    $conectar = conectar_db(); 
    $sql = "SELECT id_admin, nome_admin, sobrenome_admin, nascimento_admin, email_admin, token_admin from administrador where token_admin = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"s",$token_admin);
    $administrador = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $administrador = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $administrador;
}

function buscarUsuario($id_usuario){
    $conectar = conectar_db(); 
    $sql = "SELECT id_usuario, nome_usuario, sobrenome_usuario, nascimento_usuario, senha_usuario, email_usuario from usuario where id_usuario = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_usuario);
    $usuario = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $usuario;
}

function buscarAdmin($id_admin){
    $conectar = conectar_db(); 
    $sql = "SELECT id_admin, nome_admin, sobrenome_admin, nascimento_admin, senha_admin, email_admin from administrador where id_admin = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_admin);
    $admin = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $admin;
}

function editarUsuario($id_usuario, $nome_usuario, $sobrenome_usuario, $nascimento_usuario, $email_usuario){
    $conectar = conectar_db();
    $sql = "UPDATE usuario SET nome_usuario = ?, sobrenome_usuario = ?, nascimento_usuario = ? , email_usuario = ? WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $nome_usuario, $sobrenome_usuario, $nascimento_usuario, $email_usuario, $id_usuario);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function editarAdmin($id_admin, $nome_admin, $sobrenome_admin, $nascimento_admin, $email_admin){
    $conectar = conectar_db();
    $sql = "UPDATE administrador SET nome_admin = ?, sobrenome_admin = ?, nascimento_admin = ? , email_admin = ? WHERE id_admin = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $nome_admin, $sobrenome_admin, $nascimento_admin, $email_admin, $id_admin);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function adicionarTextoDidatico($titulo, $conteudo){
    $conectar = conectar_db();
    $sql = "INSERT INTO textosdidaticos(titulo, conteudo) VALUES (?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $titulo, $conteudo);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscaTextos(){
    $conectar = conectar_db();
    $sql = "SELECT id_texto, titulo, conteudo FROM textosdidaticos";
    $stmt = mysqli_prepare($conectar,$sql);
    $texto = array();
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row=mysqli_fetch_assoc($result)){
            array_push($texto,$row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conectar);
        return $texto;
    }
}

function excluirUsuario($id_usuario){
    $conectar = conectar_db();
    $sql = "DELETE FROM usuario WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_usuario);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function excluirAdmin($id_admin){
    $conectar = conectar_db();
    $sql = "DELETE FROM administrador WHERE id_admin = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_admin);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function validarTokenAdmin($id_admin, $token_admin){
    $ret = false;
    $conectar = conectar_db();
    $sql = "SELECT token_admin FROM administrador WHERE id_admin = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt, "i", $id_admin);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);                
        $row = mysqli_fetch_assoc($result);               
        if($row){
            if($token_admin == $row["token_admin"]){
                $ret = true;
            }
        }
    }   
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function validarTokenUsuario($id_usuario, $token_usuario){
    $ret = false;
    $conectar = conectar_db();
    $sql = "SELECT token_usuario FROM usuario WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt, "i", $id_usuario);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);                
        $row = mysqli_fetch_assoc($result);               
        if($row){
            if($token_usuario == $row["token_usuario"]){
                $ret = true;
            }
        }
    }   
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscarTextoPorId($id_texto){
    $conectar = conectar_db();
    $sql = "SELECT id_texto, titulo, conteudo from textosdidaticos where id_texto = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_texto);
    $texto = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $texto = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $texto;
}

function adicionarVideoaulaF($titulo_va, $descricao, $link){
    $conectar = conectar_db();
    $sql = "INSERT INTO videoaulas(titulo_vd, descricao_vd, link) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $titulo_va, $descricao, $link);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscaVideoaulas(){
    $conectar = conectar_db();
    $sql = "SELECT id_videoaula, titulo_vd, descricao_vd FROM videoaulas";
    $stmt = mysqli_prepare($conectar,$sql);
    $videoaula = array();
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row=mysqli_fetch_assoc($result)){
            array_push($videoaula,$row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conectar);
        return $videoaula;
    }
}

function buscarVideoaulaPorId($id_videoaula){
    $conectar = conectar_db();
    $sql = "SELECT id_videoaula, titulo_vd, descricao_vd, link from videoaulas where id_videoaula = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_videoaula);
    $videoaula = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $videoaula = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $videoaula;
}

function adicionarFormulaFunctions($titulo_fo, $materia, $expressao){
    $conectar = conectar_db();
    $sql = "INSERT INTO formulas(titulo_fo, materia, expressao) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $titulo_fo, $materia, $expressao);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function adicionarExercicioF($enunciado, $comando, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $correto, $explicacao, $id_assunto){
    $conectar = conectar_db();
    $sql = "INSERT INTO exercicios(enunciado, comando, alt_a, alt_b, alt_c, alt_d, alt_e, correto, explicacao, id_assunto) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssi", $enunciado, $comando, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $correto, $explicacao, $id_assunto);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscarVideoaulaPorTexto($txt){
    $conectar = conectar_db();
    $sql = "SELECT id_videoaula, titulo_vd, descricao_vd, link from videoaulas where titulo_vd like ?";
    $texto = "%".$txt."%";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "s", $texto);
    $videoaulas = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result)){
            array_push($videoaulas,$row);
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $videoaulas;
}

function buscaFormulas(){
    $conectar = conectar_db();
    $sql = "SELECT id_formula, titulo_fo, materia, expressao FROM formulas";
    $stmt = mysqli_prepare($conectar,$sql);
    $formula = array();
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row=mysqli_fetch_assoc($result)){
            array_push($formula,$row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conectar);
        return $formula;
    }
}

function adicionarAssuntoVideoaulaFunctions($assunto){
    $conectar = conectar_db();
    $sql = "INSERT INTO assuntoexercicio(assunto) VALUES (?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "s", $assunto);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscaAssuntos(){
    $conectar = conectar_db();
    $sql = "SELECT id_assunto, assunto FROM assuntoexercicio";
    $stmt = mysqli_prepare($conectar,$sql);
    $assunto = array();
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row=mysqli_fetch_assoc($result)){
            array_push($assunto,$row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conectar);
        return $assunto;
    }
}

function carregaTodosUsuarios(){
    $conectar = conectar_db();
    $sql = "SELECT id_usuario, nome_usuario, sobrenome_usuario, nascimento_usuario, email_usuario, senha_usuario FROM usuario";
    $stmt = mysqli_prepare($conectar, $sql);
    $usuarios = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($usuarios,$row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conectar);
        return $usuarios;
    }
}

function carregaTodosAdministradores(){
    $conectar = conectar_db();
    $sql = "SELECT id_admin, nome_admin, sobrenome_admin, nascimento_admin, email_admin, senha_admin FROM administrador";
    $stmt = mysqli_prepare($conectar, $sql);
    $admins = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($admins,$row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conectar);
        return $admins;
    }
}

function buscarExercicioPorId($id_assunto){
    $conectar = conectar_db();
    $sql = "SELECT id_exercicio, enunciado, comando, alt_a, alt_b, alt_c, alt_d, alt_e, correto, explicacao, id_assunto from exercicios where id_assunto = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_assunto);
    $exercicio = false;
    $exercicio = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($exercicio, $row);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $exercicio;
}

function verificarRespostaF($correto){
    $conectar = conectar_db();
    $sql = "SELECT id_exercicio, enunciado, comando, alt_a, alt_b, alt_c, alt_d, alt_e, correto, id_assunto from exercicios where correto = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"s",$correto);
    $exercicio = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $exercicio = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $exercicio;
}

function AddTextoFav($id_texto, $id_usuario){
    $conectar = conectar_db();
    $sql = "INSERT INTO textosfavoritos(id_texto, id_usuario) VALUES (?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_texto, $id_usuario);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscarIdTextoFavorito($id_usuario){
    $conectar = conectar_db();
    $sql = "SELECT id_texto from textosfavoritos where id_usuario = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_usuario);
    $id = false;
    $id = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($id, $row);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $id;
}

function buscarTodosTextosFavoritos($arrayDosIds){
    $conectar = conectar_db();
    $ids = implode(",",array_map("intval",$arrayDosIds));
    $sql = "SELECT id_texto, titulo, conteudo FROM textosdidaticos WHERE id_texto IN ($ids)";
    $result = mysqli_query($conectar, $sql);
    $textos = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($textos, $row);
        }
    }
    mysqli_close($conectar);
    return $textos;

    /*$stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"s",$arrayDosIds);
    $texto = false;
    $texto = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($texto, $row);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $texto;*/
}

function excluirGerUsuario($id_usuario){
    $conectar = conectar_db();
    $sql = "DELETE FROM usuario WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_usuario);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function adicionarComentarioFunctions($texto_comentario, $id_usuario, $id_videoaula, $nome_usuario, $sobrenome_usuario){
    $conectar = conectar_db();
    $sql = "INSERT INTO comentarios(texto_comentario, id_usuario, id_videoaula, nome_usuario, sobrenome_usuario) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "siiss", $texto_comentario, $id_usuario, $id_videoaula, $nome_usuario, $sobrenome_usuario);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscarComentarioPorId($id_videoaula){
    $conectar = conectar_db();
    $sql = "SELECT id_comentario, id_usuario, nome_usuario, sobrenome_usuario, id_videoaula, texto_comentario from comentarios where id_videoaula = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_videoaula);
    $comentario = false;
    $comentario = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($comentario, $row);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $comentario;
}

function removeTextoFavorito($id_texto){
    $conectar = conectar_db();
    $sql = "DELETE FROM textosfavoritos WHERE id_texto = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_texto);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscarIdVideoaulaFavorito($id_usuario){
    $conectar = conectar_db();
    $sql = "SELECT id_videoaula FROM videoaulasfavoritas WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_usuario);
    $id = false;
    $id = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($id, $row);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $id;
}

function buscarTodosVideoaulasFavoritos($arrayDosIds){
    $conectar = conectar_db();
    $ids = implode(",",array_map("intval",$arrayDosIds));
    $sql = "SELECT id_videoaula, titulo_vd, descricao_vd, link FROM videoaulas WHERE id_videoaula IN ($ids)";
    $result = mysqli_query($conectar, $sql);
    $videoaulas = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($videoaulas, $row);
        }
    }
    mysqli_close($conectar);
    return $videoaulas;
}

function AddVideoaulaFav($id_videoaula, $id_usuario){
    $conectar = conectar_db();
    $sql = "INSERT INTO videoaulasfavoritas(id_videoaula, id_usuario) VALUES (?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_videoaula, $id_usuario);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function removeVideoaulaFavorito($id_videoaula){
    $conectar = conectar_db();
    $sql = "DELETE FROM videoaulasfavoritas WHERE id_videoaula = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_videoaula);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscarIdFormulaFavorito($id_usuario){
    $conectar = conectar_db();
    $sql = "SELECT id_formula from formulasfavoritas where id_usuario = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id_usuario);
    $id = false;
    $id = [];
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            array_push($id, $row);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $id;
}

function buscarTodosFormulasFavoritos($arrayDosIds){
    $conectar = conectar_db();
    $ids = implode(",",array_map("intval",$arrayDosIds));
    $sql = "SELECT id_formula, titulo_fo, materia, expressao FROM formulas WHERE id_formula IN ($ids)";
    $result = mysqli_query($conectar, $sql);
    $formulas = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($formulas, $row);
        }
    }
    mysqli_close($conectar);
    return $formulas;
}

function removeFormulaFavorito($id_formula){
    $conectar = conectar_db();
    $sql = "DELETE FROM formulasfavoritas WHERE id_formula = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_formula);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function AddFormulaFav($id_formula, $id_usuario){
    $conectar = conectar_db();
    $sql = "INSERT INTO formulasfavoritas(id_formula, id_usuario) VALUES (?,?)";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_formula, $id_usuario);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

function buscarImagem($id_usuario){
    $conectar = conectar_db(); 
    $sql = "SELECT imagem_usuario from usuario where id_usuario = ?";
    $stmt = mysqli_prepare($conectar,$sql);
    mysqli_stmt_bind_param($stmt,"s",$id_usuario);
    $imagem_usuario = false;
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $imagem_usuario = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $imagem_usuario;
}

/*function verEmailSenhaUsu($email_usuario, $senha_usuario){
    $conectar = conectar_db(); 
    $sql = "SELECT * FROM usuario WHERE email_usuario = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email_usuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        if(password_verify($senha_usuario, $row["senha_usuario"])){
            mysqli_stmt_close($stmt);
            mysqli_close($conectar);
            return true;
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return false;
}*/

function verEmailSenhaUsu($email_usuario, $senha_usuario){
    $conectar = conectar_db();
    $sqlEmail = "SELECT * FROM usuario WHERE email_usuario = ?";
    $stmtEmail = mysqli_prepare($conectar, $sqlEmail);
    mysqli_stmt_bind_param($stmtEmail, "s", $email_usuario);
    mysqli_stmt_execute($stmtEmail);
    $resultEmail = mysqli_stmt_get_result($stmtEmail);
    if(mysqli_fetch_assoc($resultEmail)){
        mysqli_stmt_close($stmtEmail);
        mysqli_close($conectar);
        return true;
    }
    $sqlSenha = "SELECT * FROM usuario";
    $resultSenha = mysqli_query($conectar, $sqlSenha);
    while ($row = mysqli_fetch_assoc($resultSenha)) {
        if(password_verify($senha_usuario, $row["senha_usuario"])){
            mysqli_stmt_close($stmtEmail);
            mysqli_close($conectar);
            return true;
        }
    }
    mysqli_stmt_close($stmtEmail);
    mysqli_close($conectar);
    return false;
}

function excluirComentarios($id_usuario){
    $conectar = conectar_db();
    $sql = "DELETE FROM comentarios WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conectar, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_usuario);
    $ret = false;
    if(mysqli_stmt_execute($stmt)){
        $ret = true;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conectar);
    return $ret;
}

?>