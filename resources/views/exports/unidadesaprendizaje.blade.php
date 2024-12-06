<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Creditos</th>
        <th>Horas</th>
        <th>Optativa</th>
        <th>Semestre</th>
        <th>Descripción</th>
        <th>Requisitos</th>
    </tr>
    </thead>
    <tbody>
    @foreach($unidades as $mat)
        <tr>
            <td>{{ $mat->materia_licenciatur }}</td>
            <td>{{ $mat->creditos_materia_lic }}</td>
            <td>{{ $mat->horas_semana_materia_lic }}</td>
            <td>{{ $mat->optativa_materia_lic }}</td>
            <td>{{ $mat->semestre_materia_lic }}</td>
            <td>{!! $mat->descripcion_materia_lic !!}</td>
            <td>{!! $mat->requisitos_materia_lic !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>