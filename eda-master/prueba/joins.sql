SELECT
T1.fecha_revision, T1.dni, T1.nombre, T2.placa, T3.descripcion, T4.resultado
FROM
historial T1
INNER JOIN vehiculos T2
INNER JOIN empresas T3
INNER JOIN antecedentes T4
ON
T1.id_vehiculo = T2.id
AND
T1.id_empresa = T3.id
AND
T1.id  = T4.id_historial