<script type="text/javascript">

    // $(document).ready(function () {
    //     //your code here
    //
    // });


    $(function () {
        $(".formConfirm").click(function (e) {
            e.preventDefault();
            console.log("hola eliminar");
            var el = $(this).parent();
            var title = el.attr('data-title');
            var msg = el.attr('data-message');
            var dataForm = el.attr('data-form');


            $('#formConfirm')
                .find('#frm_body').html(msg)
                .end().find('#frm_title').html(title)
                .end().modal('show');

            $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);

        });
    });
    $(function () {
        $(".formFinalizar").click(function (e) {
            e.preventDefault();
            console.log("hola finalizar");
            var el = $(this);
            var title = el.attr('data-title');
            var msg = el.attr('data-message');
            var dataForm = el.attr('data-form');


            $('#formConfirm')
                .find('#frm_body').html(msg)
                .end().find('#frm_title').html(title)
                .end().modal('show');

            $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);

        });
    });
    $(function () {
        $("#frm_submit").click(function (e) {
            console.log("registro a eliminar")
            var id = $(this).attr('data-form');
            console.log("entra confirm" + id);
            $(id).submit();
        });

    });

</script>

<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="frm_title">Eliminar registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>

            </div>


            <div class="modal-body" id="frm_body"></div>
            <div class="modal-footer">
                <button style='margin-left:10px;' type="button" class="btn btn-primary pull-right"
                        id="frm_submit">Aceptar
                </button>
                <button type="button" class="btn btn-danger  pull-right" data-dismiss="modal"
                        id="frm_cancel">Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
