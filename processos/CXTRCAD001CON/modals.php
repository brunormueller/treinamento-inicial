<div class="modal fade" id="ModalEditarCliente"  role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Edição de Cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_editar" id="id_editar_cliente" />
                <br>
                <div id="dados_editar_cliente"></div>
                <center>
                    <div style="width: 85%">
                        <img id="aguarde_editar" src="<?php echo URL::getBase(); ?>assets/images/gif/loading.gif" style="display:none;" />

                        <div class="alert alert-danger" role="alert" id="erro_editar_cliente" style="display:none;">
                            <center><b><span id="msg_erro"></span></b></center>
                        </div>

                        <div class="alert alert-success" role="alert" id="sucesso_editar_cliente" style="display:none;">
                            <center><b>Editado com Sucesso!</b></center>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <button id="cancela_editar_cliente" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar
                    <i class="fa fa-remove" aria-hidden="true"></i></button>
                <button type="submit" id="confirma_editar_cliente" class="btn btn-success">Confirmar <i class="fa fa-check" aria-hidden="true"></i></button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="ModalDesativar" style="z-index: 999999999" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Alteração de Status</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_desativar" id="id_desativar" />
                <input type="hidden" name="status_desativar" id="status_desativar" />

                Deseja alterar o status do Cliente?
                <br>
                <div id="dados_desativar"></div>

                <center>
                    <div style="width: 85%">
                        <img src="assets/images/gif/aguarde.gif" style="width: 150px; height: 150px; display: none;" id="aguarde_desativar" />

                        <div class="alert alert-danger" role="alert" id="erro_desativar" style="display:none;">
                            <center><b> Erro ao alterar status. Contate o Suporte!</b></center>
                        </div>
                        <div class="alert alert-success" role="alert" id="sucesso_desativar" style="display:none;">
                            <center><b> Status alterado com Sucesso!</b></center>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar <i class="fa fa-remove" aria-hidden="true"></i></button>
                <button onclick="alterarStatus()" type="button" id="confirma_desativar" class="btn btn-success">Confirmar <i class="fa fa-check" aria-hidden="true"></i></button>
            </div>
        </div>

    </div>
</div>
<script src="js/consultas/CXTRCAD001CON/CXTRCAD001ACOES.js"></script>
<script src="js/consultas/CXTRCAD001CON/CXTRCAD001DES.js"></script>