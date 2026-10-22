<!-- NOTA: Cuando se crea una librería:
- Las funciones que realizan operaciones no muestran texto ni devuelven cadena con el
texto formateado, es la aplicación principal quien se encarga de mostrar los resultados.
- Se comprueban argumentos. En caso de error se devuelve false. En la aplicación
principal se comprueba si la llamada a una función es correcta o errónea.
- Se documentan las funciones indicando parámetros y operación: usar /**. Además se
indican comentarios en todo lo que se deba aclarar de su funcionamiento.
- En todas las funciones se le indicará el tipo de los parámetros/valor de retorno.
- Cuando la función pueda devolver error, se hará la llamada comprobando si se ha producido o no
el error. -->

<!-- FUNCIONES -->

<!-- 1.- Función cuentaVeces().
A esta función se le pasan cuatro parámetros: un array, una cadena y dos números.

La función se encargará de añadir en el array el primer número a la posición asociativa
indicada por la cadena. Hay que tener en cuenta que el array debe quedar actualizado cuando se
salga de la función.

Además, cada vez que se llama a la función, se devuelve en el segundo número
un valor que corresponde con el número de llamada actual (1 para la primera, 2 para la segunda
llamada, etc). Se devolverá true si todo ha ido bien y false si se ha detectado algún error.
(se debe dar error si se indica como posición“2daw”o “primera”) -->

<?php

/**
 * Función que introduce en el array el num1 en la posicion asociativa de la cadena
 * Tambien guarda el num de llamadas que se le hacen a la funcion
 * 
 * Devuelve true si esta todo correcto y false si encuentra algun error
 *
 * @param array $miArray
 * @param string $miCadena
 * @param integer $num1
 * @param integer $num2
 * @return true|false
 */
function cuentaVeces(array &$miArray, string $miCadena, int $num1, int &$num2): bool
{

    static $cont = 0;
    $cont++;
    $num2 = $cont;
    static $arrayMetodo = [];

    if ($miCadena === "2daw" || $miCadena === "primera") {
        return false; // Error
    } else {
        $arrayMetodo[$miCadena] = $num1;
        $miArray = $arrayMetodo;

        return true;
    }
}

// 2.- Función generarCadena().
// A esta función se le pasa un parámetro con valor por defecto 10 y se
// encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
// aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false 
// si se ha indicado un número negativo o igual a 0.

/**
 * Función a la que se le pasa un número mayor a 0 y crea una cadena con caracteres aleatorios 
 * con la longitud del número que se le ha pasado. Devolverá false si el número es negativo o 0. Si no se 
 * le indica ningún número, tomará como valor por defecto 10.
 *
 * @param integer $num -> Valor por defecto = 10
 * @return string|false
 */
function generarCadena(int $num = 10): string | false
{
    $caracteres = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
        '0','1','2','3','4','5','6','7','8','9'
    ];
    $cadena = "";

    if ($num <= 0) {
        return false; // Error
    } else {
        for ($i = 0; $i < $num; $i++) {
            $cadena .= $caracteres[mt_rand(0, count($caracteres) - 1)];
        }
        return $cadena;
    }
}

// 3.- Función operaciones().
// Esta función recibe al menos tres parámetros. El primero (entero) es el
// tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser
//
// 1, suma todos los operandos
// 2, al primer operando se restan el resto
// 3, multiplicación de todos los operandos.
//
// En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan
// los de las posiciones impares (el primer operando es 1).

/**
 * Función que recibe al menos 3 parametros. El primero es el tipo de la operacion y el resto son números
 * 
 * 1. Suma todos los operandos
 * 2. Al primer operando se restan el resto
 * 3. Multiplicación de todos los operandos.
 * 
 * Si se elige otra opción que no sean estas tres, se suman los operandos que ocupan las posiciones pares y se restan
 * los de las posiciones impares
 *
 * @param integer $tipoOperacion
 * @param integer $op1
 * @param integer $op2
 * @param array ...$resto
 * @return integer
 */
function operaciones(int $tipoOperacion, int $op1, int $op2, ...$resto): int
{

    $resultado = 0;

    switch ($tipoOperacion) {
        case 1:
            $resultado = $op1 + $op2;
            foreach ($resto as $value) {
                $resultado += $value;
            }
            break;
        case 2:
            $resultado = $op1 - $op2;
            foreach ($resto as $value) {
                $resultado -= $value;
            }
            break;
        case 3:
            $resultado = $op1 * $op2;
            foreach ($resto as $value) {
                $resultado *= $value;
            }
            break;
        default:
            $resultado = -$op1 + $op2;
            foreach ($resto as $key => $value) {
                if ($key % 2 !== 0) {
                    $resultado += $value;
                } else {
                    $resultado -= $value;
                }
            }
            break;
    }

    return $resultado;
}

// 4.- Función devuelve().
// Esta función recibe como parámetros tres números (enteros) y devuelve la
// suma de los tres valores en el primer parámetro y como resultado de la función el producto de los
// tres valores. Los dos últimos parámetros tendrán definidos valor por defecto (el que queráis).
//
// $valor=7;
// devuelve($valor,4) //$valor valdrá 7+4+10 y se devuelve 7*4*10 (10 es el valor por defecto que
// le he puesto al tercer parámetro.
//
// Hacer varias llamadas a la función indicando:
// - Los tres parámetros
// - El primer parámetro únicamente
// - El primer y el segundo parámetro
// - El primer y el tercer parámetro (ojo, el segundo parámetro no se indica)

/**
 * Función a la recibe como parámetros tres números (int) y devuelve la suma de los tres valores
 * en el primer parámetro y como resultado la multiplicacion de los tres valores.
 * Los dos últimos parámetros tendrán definidos valor por defecto.
 *
 * @param integer $num1
 * @param integer $num2
 * @param integer $num3
 * @return integer
 */
function devuelve(int &$num1, int $num2 = 5, int $num3 = 10): int
{
    $resultado = $num1 * $num2 * $num3;
    $num1 += $num2 + $num3;
    return $resultado;
}

// 5.- Se tienen las funciones suma, resta y multiplicacion que reciben cada una dos parámetros
// numéricos (entero) y que devuelven el resultado de la operación que indica su nombre sobre los
// parámetros.

// Tenemos la Función hacerOperacion() que recibe tres parámetros.
// El primero es una cadena que puede ser suma, resta o multiplicacion. Los otros dos son los operandos.
// Esta función se encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando una
// variablefunción para llamar a la operación.
//
// Hay que comprobar indicando una operación correcta (devuelve false si la operación no es válida).
//
// hacerOperacion(“resta”,3,1) //devuelve 3-1. No se llama directamente a la función resta, se tiene una variable función para ello

function suma(int $num1, int $num2): int
{
    return $num1 + $num2;
}

function resta(int $num1, int $num2): int
{
    return $num1 - $num2;
}

function multiplicacion(int $num1, int $num2): int
{
    return $num1 * $num2;
}

/**
 * Función que recibe tres parámetros. Una cadena que puede ser "suma", "resta" o "multiplicacion", los otros dos son los operandos. Esta
 * funcion devuelve el resultado de ejecutar la "cadena" con los operandos usando una variable-función para llamar a la operación
 *
 * @param string $cadena
 * @param integer $num1
 * @param integer $num2
 * @return string|false
 */
function hacerOperacion(string $cadena, int $num1, int $num2): string|false
{
    $resultado = "";
    switch ($cadena) {
        case "suma":
            $resultado = $cadena($num1, $num2);
            break;
        case "resta":
            $resultado = $cadena($num1, $num2);
            break;
        case "multiplicacion":
            $resultado = $cadena($num1, $num2);
            break;
        default:
            $resultado = false; // Error
            break;
    }
    return $resultado;
}

// 6.- Crear la función llamadaAFuncion que recibe tres operandos (entero, entero y callable) y que
// devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros.

// Llamar a la función llamadaAFuncion 3 veces pasando como parámetro de callback funciones de
// flecha distintas que tu definas

// llamadaAFuncion(1,2,fn($a,$b)=>$a+$b)

// Repetir las llamadas, definiendo las 3 funciones como anónimas (se asignan a variables)

/**
 * Función a la que se le pasan dos números entero y un operando callable que devuelve
 * un número entero que es el resultado de llamar al parámetro callback con los otros parámetros.
 *
 * @param integer $num1
 * @param integer $num2
 * @param callable $funcion
 * @return integer
 */
function llamadaAFuncion(int $num1, int $num2, callable $funcion): int
{
    return $funcion($num1, $num2);
}

// 7.- Función ordenar(): A esta función se le pasa un array y lo ordena mediante una llamada a usort,
// al que se indicará como función callback una función anónima que ordenará en orden descendente
// según el número de caracteres de cada elemento.
//
// $vector=array((“uno”,“grande”,“caminos”,”a”)
// Ordenar($vector);//el vector debe quedar (“caminos”,”grande”,”uno”,”a”)

/**
 * Función que ordena un array en orden descendente según el
 * número de caracteres de cada elemento
 *
 * @param array $array
 * @return void
 */
function ordenar(array &$array): void
{
    $funcion = fn($a, $b): int => mb_strlen($a) < mb_strlen($b);
    usort($array, $funcion);
}