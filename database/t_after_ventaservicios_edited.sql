CREATE TRIGGER t_after_ventasservicio_edited 
AFTER UPDATE ON ventasservicio 
	FOR EACH ROW 
	BEGIN 
		IF NEW.CodigoEstadoVenta = 'F' THEN UPDATE Articulos INNER JOIN ventasserviciodetallearticulos ON Articulos.IdArticulo = ventasserviciodetallearticulos.IdArticulo set Articulos.CantidadExistencia = Articulos. CantidadExistencia - ventasserviciodetallearticulos.Cantidad WHERE ventasserviciodetallearticulos.IdVentaServicio = NEW.IdVentaServicio; 
	END IF; 
END