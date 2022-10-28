<?php
class TempoSessao
{
    public static function atualizar()
    {
        date_default_timezone_set('America/Sao_Paulo');

        if (session_id() == '') {
            session_start();
        }

        $_SESSION["sessiontime"] = time() + 7200;
    }
}