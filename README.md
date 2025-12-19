Tarea - Desarrollo en Plataformas

Estudiante: Dana Belen Analuisa Caza
Fecha: 19 de diciembre de 2025
Paralelo: [TU PARALELO]

Mis Decisiones de Diseño

1. Tabla

Nombre de la tabla: equipos

Campos:

Campo: id
Tipo: BIGINT (autoincremental)
¿Obligatorio?: Sí (Primary Key)

     Campo             Tipo         ¿Obligatorio?
tipo_equipo         VARCHAR(100)          Sí
marca_modelo        VARCHAR(150)          Sí
problema_reportado    TEXT                Sí
nombre_cliente      VARCHAR(100)          Sí
telefono            VARCHAR(15)           Sí
estado              VARCHAR(20)           Sí (valor por defecto: 'recibido')
created_at           TIMESTAMP            Sí (automático)
updated_at           TIMESTAMP            Sí (automático)
deleted_at	     TIMESTAMP	          Sí (automático)

2. Tipos de estados del equipo:
- recibido
- diagnosticando
- reparando
- listo
- entregado

3. ¿Se puede eliminar registros?

Respuesta: No, se implementó un soft delete. 

Razón (1 línea): Se recomienda NO eliminar equipos entregados para mantener el historial técnico solicitado, permitiendo auditoría y trazabilidad de trabajos realizados.
