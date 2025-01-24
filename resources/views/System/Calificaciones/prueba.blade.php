<tbody>
    @foreach ($solicitudes as $solicitud)
        <tr>
            <td>{{ $solicitud->folio }}</td>
            <td>{{ \Carbon\Carbon::parse($solicitud->fecha)->format('d/m/Y H:i') }}</td>
            <td>{{ $solicitud->materia }}</td>
            <td>{{ $solicitud->plan_estudios }}</td>
            <td>{{ $solicitud->cantidad }}</td>
            <td>
                @switch($solicitud->Estatus)
                    @case(0)
                        No enviada
                        @break
                    @case(1)
                        Enviada a Escolar
                        @break
                    @case(2)
                        Firmada por Escolar
                        @break
                    @case(3)
                        Firmada por Docente
                        @break
                    @case(4)
                        Firmada por Coordinador
                        @break
                    @case(5)
                        Firmada por Subdirector Académico
                        @break
                    @default
                        No especificado
                @endswitch
            </td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#pdfModal" onclick="mostrarModal('{{ $solicitud->folio }}')">Ver Detalles</button>
            </td>
        </tr>
    @endforeach
</tbody>
