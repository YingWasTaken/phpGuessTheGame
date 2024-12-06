<?php

class Examen
{

    private array  $preguntas = [];
    private string $seccion;
    private int $num_preguntas;

    public function __construct($seccion, $imagenes, int $numero_preguntas)
    {

        $this->num_preguntas = $numero_preguntas;
        $this->seccion = $seccion;
        $imagenes = $imagenes[$seccion];

        $categoria = array_keys($imagenes)[rand(0, count($imagenes) - 1)];

        for ($n = 0; $n < $numero_preguntas; $n++) {
            $this->preguntas[] = new Pregunta($imagenes, $categoria);
        }
    }

    public function url_first_img()
    {
        $url = $this->seccion;
        $url .= "/" . $this->preguntas[0]->getImagen();
        return $url;
    }

    public function serializa_examen()
    {
        return base64_encode(serialize($this));
    }

    public static function unserialize_examen($examen): Examen
    {
        return unserialize(base64_decode($examen));
    }

    public function get_correct_answer($img)
    {
        $partes = explode('/', $img);
        $solucion = explode('.png', $partes[2]);
        return $solucion[0];
    }

    public function siguienteImg($num)
{
    if ($num >= $this->num_preguntas) {
        return null;
    }

    $url = $this->seccion . "/" . $this->preguntas[$num]->getImagen();
    return $url;
}

}
