DELIMITER $$
 
CREATE TRIGGER t_after_ingresosarticulos_edited
AFTER UPDATE
ON ingresosarticulos FOR EACH ROW
BEGIN
    IF NEW.CodigoEstadoIngreso = 'F' THEN
        UPDATE Articulos
        INNER JOIN ingresosarticulosdetalle
        ON  Articulos.IdArticulo = ingresosarticulosdetallE.IdArticulo        
			set Articulos.CantidadExistencia = Articulos. CantidadExistencia + ingresosarticulosdetallE.Cantidad				 
		WHERE ingresosarticulosdetallE.IdIngresoArticulo = NEW.IdIngresoArticulo
    END IF;
END$$
 
DELIMITER ;