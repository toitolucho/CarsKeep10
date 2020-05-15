CREATE DATABASE Lubricos

use Lubricos

DROP TABLE VentasServicioDetalleArticulos;
DROP TABLE VentasServicioDetalleMantenimiento;
DROP TABLE VentasServicio;
DROP TABLE TiposMantenimientosDetalleArticulos;
DROP TABLE TiposMantenimientosDetalle;
DROP TABLE TiposMantenimientos;
DROP TABLE ActividadesMantenimiento;
DROP TABLE IngresosArticulosDetalle;
DROP TABLE IngresosArticulos;
DROP TABLE Proveedores;
DROP TABLE Articulos;
DROP TABLE Categorias;
DROP TABLE Usuarios;
DROP TABLE Clientes;


CREATE TABLE Clientes
(
	IdCliente			INT	AUTO_INCREMENT,
	ci					CHAR(10),
	Nombres				VARCHAR(100),
	Apellidos			varchar(100),
	NroCelular			INT,
	CorreoElectronico	VARCHAR(200),
	FechaRegistro		DATETIME,
	PRIMARY KEY (IdCliente)
)
GO

CREATE TABLE Usuarios
(
	IdUsuario				INT AUTO_INCREMENT,
	NombreCompleto			VARCHAR(200),
	NombreUsuario			VARCHAR(100),
	Contrasenia				VARCHAR(100),
	FechaRegistro			DATETIME,
	TipoUsuario				CHAR(1),--'S'->SECRETARIA, --'A'->ADMINISTRADOR, 'T'->TECNICO
	CodigoEstadoDisposicion CHAR(1),-- 'O'->OCUPADO, 'L'->LIBRE
	CodigoEstado			CHAR(1),-- 'V'->VIGENTE, 'B'->BAJA, 'S'->SUSPENDIDO
	PRIMARY KEY(IdUsuario)
)

CREATE TABLE Categorias
(
	IdCategoria		INT AUTO_INCREMENT,
	NombreCategoria	VARCHAR(300) UNIQUE,
	PRIMARY KEY(IdCategoria)
)

CREATE TABLE Articulos
(
	IdArticulo			INT AUTO_INCREMENT,
	NombreArticulo		VARCHAR(200),
	IdCategoria			INT,
	CantidadExistencia	INT,
	PrecioVigente		DECIMAL(10,2),
	TipoInventario		CHAR(1), ----'P'->PEPS, 'U'->UEPS, 'O'->PONDERADO(PROMEDIADO)
	Descripcion			VARCHAR(600),
	PRIMARY KEY(IdArticulo),
	FOREIGN KEY (IdCategoria) REFERENCES Categorias(IdCategoria)
)

CREATE TABLE Proveedores
(
	IdProveedor			INT AUTO_INCREMENT,
	NombreRazonSocial	VARCHAR(200) UNIQUE,
	NombreRepresentante	VARCHAR(200),
	Direccion			VARCHAR(150),
	NroCelular			CHAR(10),
	PRIMARY KEY (IdProveedor)
)

CREATE TABLE IngresosArticulos
(
	IdIngresoArticulo	INT AUTO_INCREMENT,
	IdUsuario			INT,
	IdProveedor			INT,
	FechaHoraRegistro	DATETIME,
	CodigoEstadoIngreso	CHAR(1),-- 'I'->iniciado, 'A'->anulado, 'F'->Finalizado
	Observaciones		VARCHAR(600),
	PRIMARY KEY (IdIngresoArticulo),
	FOREIGN KEY (IdUsuario) REFERENCES Usuarios(IdUsuario),
	FOREIGN KEY (IdProveedor) REFERENCES Proveedores(IdProveedor)
)

CREATE TABLE IngresosArticulosDetalle
(
	IdIngresoArticulo	INT,
	IdArticulo			INT,
	Cantidad			INT	NOT NULL,
	Precio				DECIMAL(10,2) NOT NULL,
	PRIMARY KEY(IdIngresoArticulo, IdArticulo),
	FOREIGN KEY (IdIngresoArticulo) REFERENCES IngresosArticulos(IdIngresoArticulo),
	FOREIGN KEY (IdArticulo) REFERENCES Articulos(IdArticulo),
	CHECK(Cantidad > 0)
)


CREATE TABLE ActividadesMantenimiento
(
	IdActividad			INT AUTO_INCREMENT,
	NombreActividad		VARCHAR(200) UNIQUE,
	PRIMARY KEY (IdActividad)
);

CREATE TABLE TiposMantenimientos
(
	IdTipoMantenimiento			INT AUTO_INCREMENT,
	NombreMantenimiento			VARCHAR(100),
	Descripcion					VARCHAR(200),
	LimiteInferiorKilometraje	DECIMAL(10,2),
	LimiteSuperiorKilometraje	DECIMAL(10,2),
	PRIMARY KEY (IdTipoMantenimiento)	
);


CREATE TABLE TiposMantenimientosDetalle
(
	IdTipoMantenimiento		INT,
	IdActividad				INT,
	Obligatorio				CHAR(1),
	CostoServicio			DECIMAL(10,2) DEFAULT 0,
	PRIMARY KEY (IdTipoMantenimiento, IdActividad),
	FOREIGN KEY (IdTipoMantenimiento) REFERENCES TiposMantenimientos(IdTipoMantenimiento),
	FOREIGN KEY (IdActividad) REFERENCES ActividadesMantenimiento(IdActividad)
);

CREATE TABLE TiposMantenimientosDetalleArticulos
(
	IdTipoMantenimiento		INT,
	IdActividad				INT,
	IdArticulo				INT	,
	PRIMARY KEY (IdTipoMantenimiento, IdActividad, IdArticulo),
	FOREIGN KEY (IdTipoMantenimiento, IdActividad) REFERENCES TiposMantenimientosDetalle(IdTipoMantenimiento, IdActividad),
	FOREIGN KEY (IdArticulo) REFERENCES Articulos(IdArticulo)
);


CREATE TABLE VentasServicio
(
	IdVentaServicio		INT AUTO_INCREMENT,
	IdUsuarioSecretaria	INT,
	IdUsuarioTecnico	INT,
	IdCliente			INT,
	FechaHoraVenta		DATETIME,
	CodigoEstadoVenta	CHAR(1),-- 'I'->iniciado, 'A'->anulado, 'F'->Finalizado
	Kilometraje			DECIMAL(10,2),
	MarcaMovilidad		VARCHAR(10),
	Observaciones		VARCHAR(600),
	PRIMARY KEY(IdVentaServicio),
	FOREIGN KEY(IdUsuarioSecretaria)REFERENCES  Usuarios(IdUsuario),
	FOREIGN KEY (IdCliente) REFERENCES Clientes(IdCliente)
);

CREATE TABLE VentasServicioDetalleMantenimiento
(
	IdVentaServicio			INT AUTO_INCREMENT,
	IdActividad				INT,
	Costo					DECIMAL(10,2),
	CodigoEstadoEjecucion	CHAR(1) ,-- 'F'->FINALIZADO, 'A' ->ANULADO, 'P'->PENDIENTE,'I'->INICIADO
	Observacion				VARCHAR(200),
	PRIMARY KEY (IdVentaServicio, IdActividad),
	FOREIGN KEY (IdVentaServicio) REFERENCES VentasServicio(IdVentaServicio),
	FOREIGN KEY (IdActividad) REFERENCES ActividadesMantenimiento(IdActividad)
);

CREATE TABLE VentasServicioDetalleArticulos
(
	IdVentaServicio		INT AUTO_INCREMENT,
	IdArticulo			INT,
	Cantidad			INT,
	Costo				DECIMAL(10,2),
	PRIMARY KEY (IdVentaServicio, IdArticulo),
	FOREIGN KEY (IdVentaServicio) REFERENCES VentasServicio(IdVentaServicio),
	FOREIGN KEY (IdArticulo) REFERENCES Articulos(IdArticulo)

);

