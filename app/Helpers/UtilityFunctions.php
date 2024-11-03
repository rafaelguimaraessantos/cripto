<?php
// app/Helpers/UtilityFunctions.php

namespace App\Helpers;

class UtilityFunctions
{
     public static function convertToFloat($value)
    {
        // Verifique se o valor é uma string e não está vazio
        if (is_string($value) && !empty($value)) {
            // Remove espaços em branco
            $value = trim($value);
            // Remove pontos (separadores de milhar)
            $value = str_replace('.', '', $value);
            // Substitui a vírgula por ponto (separador decimal)
            $value = str_replace(',', '.', $value);
            // Converte para float
            return (float) $value; 
        }

        // Retorna 0 ou lança uma exceção se não for um número válido
        return 0; // Ou você pode lançar uma exceção
    }
}
