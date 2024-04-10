<?php

namespace Tests\Feature;

use App\Models\Jugador;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JugadoresMigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para verificar si se puede obtener la lista de jugadores.
     *
     * @return void
     */
    public function testObtenerListaDeJugadores()
    {
        $response = $this->get('/jugadors');

        $response->assertStatus(200);
    }

    /**
     * Test para verificar si se puede crear un nuevo jugador.
     *
     * @return void
     */
    public function testCrearJugador()
    {
        $data = [
            'Nombre' => 'Lionel',
            'Apellido' => 'Messi',
            'Posicion' => 'Delantero',
            'Dorsal' => 10,
        ];

        $response = $this->post('/jugadors', $data);

        $response->assertStatus(302); // Redirección después de crear un jugador
    }

    /**
     * Test para verificar si se puede actualizar un jugador existente.
     *
     * @return void
     */
    public function testActualizarJugador()
    {
        // Crear un jugador directamente en la base de datos
        $jugador = Jugador::create([
            'Nombre' => 'Lionel',
            'Apellido' => 'Messi',
            'Posicion' => 'Delantero',
            'Dorsal' => 10,
        ]);

        // Datos actualizados para el jugador
        $datosActualizados = [
            'Nombre' => 'Cristiano',
            'Apellido' => 'Ronaldo',
            'Posicion' => 'Delantero',
            'Dorsal' => 7,
        ];

        // Envía una solicitud PUT a la ruta /jugadores/{$jugador->id}
        $response = $this->put("/jugadors/{$jugador->id}", $datosActualizados);

        // Verificar si se redirecciona correctamente después de actualizar un jugador
        $response->assertStatus(302); // Redirección después de actualizar un jugador
    }

    public function testEliminarJugador()
    {
        // Crear un jugador directamente en la base de datos
        $jugador = Jugador::create([
            'Nombre' => 'Lionel',
            'Apellido' => 'Messi',
            'Posicion' => 'Delantero',
            'Dorsal' => 10,
        ]);

        // Envía una solicitud DELETE a la ruta /jugadores/{$jugador->id}
        $response = $this->delete("/jugadors/{$jugador->id}");

        // Verificar si se redirecciona correctamente después de eliminar un jugador
        $response->assertStatus(302); // Redirección después de eliminar un jugador
    }

    public function testObtenerJugador()
    {
        // Crear un jugador directamente en la base de datos
        $jugador = Jugador::create([
            'Nombre' => 'Cristiano',
            'Apellido' => 'Ronaldo',
            'Posicion' => 'Extremo Derecho',
            'Dorsal' => 7,
        ]);
    
        // Envía una solicitud GET a la ruta /jugadores/{$jugador->id}
        $response = $this->get("/jugadors/{$jugador->id}");
    
        // Verificar si se obtiene el jugador correctamente
        $response->assertStatus(200); // Verificar si se obtiene correctamente el estado 200
        $response->assertSeeText('Cristiano'); // Verificar si el nombre del jugador está presente en la respuesta
        $response->assertSeeText('Ronaldo'); // Verificar si el apellido del jugador está presente en la respuesta
        $response->assertSeeText('Extremo Derecho'); // Verificar si la posición del jugador está presente en la respuesta
        $response->assertSeeText('7'); // Verificar si el dorsal del jugador está presente en la respuesta
    }
    


    
    /**
     * Test para verificar si se puede obtener la lista de jugadores con datos.
     *
     * @return void
     */
    public function testObtenerListaDeJugadoresConDatos()
    {
        // Crear jugadores directamente en la base de datos
        Jugador::create([
            'Nombre' => 'Lionel',
            'Apellido' => 'Messi',
            'Posicion' => 'Delantero',
            'Dorsal' => 10,
        ]);
        Jugador::create([
            'Nombre' => 'Cristiano',
            'Apellido' => 'Ronaldo',
            'Posicion' => 'Delantero',
            'Dorsal' => 7,
        ]);
        Jugador::create([
            'Nombre' => 'Neymar',
            'Apellido' => 'Jr',
            'Posicion' => 'Delantero',
            'Dorsal' => 11,
        ]);
    
        // Envía una solicitud GET a la ruta /jugadores
        $response = $this->get('/jugadors');
    
        // Verificar si se obtiene la lista de jugadores correctamente
        $response->assertStatus(200); // Verificar si se obtiene correctamente el estado 200
        $response->assertSeeText('Lionel'); // Verificar si el nombre de Lionel Messi está presente en la respuesta
        $response->assertSeeText('Cristiano'); // Verificar si el nombre de Cristiano Ronaldo está presente en la respuesta
        $response->assertSeeText('Neymar'); // Verificar si el nombre de Neymar Jr está presente en la respuesta
    }
    /**
     * Test para verificar si se puede obtener un jugador que no existe.
     *
     * @return void
     */
    public function testObtenerJugadorInexistente()
    {
        // ID de jugador que no existe en la base de datos
        $jugadorId = 999;

        // Envía una solicitud GET a la ruta /jugadores/{$jugadorId}
        $response = $this->get("/jugadors/{$jugadorId}");

        // Verificar si se obtiene un error 404 (no encontrado)
        $response->assertStatus(404); // Verificar si se obtiene correctamente el estado 404
    }
    /**
 * Test para verificar si no se puede crear un jugador con datos incompletos.
 *
 * @return void
 */
public function testCrearJugadorConDatosIncompletos()
{
    // Datos incompletos para crear un jugador
    $data = [
        'Nombre' => 'Cristiano',
        'Apellido' => 'Ronaldo',
        // Falta proporcionar la posición y el dorsal
    ];

    // Envía una solicitud POST a la ruta /jugadors con datos incompletos
    $response = $this->post('/jugadors', $data);

    // Verificar si se recibe una redirección en lugar de un código de estado 422
    $response->assertStatus(302); // Verificar si se recibe correctamente una redirección
}
}
