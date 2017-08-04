<?php $__env->startSection('content'); ?>
<!-- MESSAGES -->
<?php if(session()->has('message-sucs')): ?>
    <div class="alert alert-success fade-badge" >
        <?php echo e(session()->get('message-sucs')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('message-bad')): ?>
   <div class="alert alert-danger fade-badge">
        <?php echo e(session()->get('message-bad')); ?>

    </div>
<?php endif; ?>
<!--       -->

<div class="container">
    <div class="row">
      <div style='height:30px;line-height: 30px;margin-bottom: 20px;padding-left:10px;'>
          <span style='font-size:26px;'>Klienti</span> <button type="button" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#add_clients" >+&nbsp;Pievienot klientu</button>
      </div>
       <div id="add_clients" class="collapse">
          
            <form class="form-horizontal" method="POST" action="/workspace/addClient">
            <?php echo csrf_field(); ?>

              <div class="form-group">
                <label class="control-label col-sm-2" for="title">Nosaukums:</label>
                <div class="col-sm-4">
                  <input type="text" maxlength="200" class="form-control"  name="title" placeholder="Klienta nosaukums" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Epasts:</label>
                <div class="col-sm-4"> 
                  <input type="email" class="form-control" name="email" placeholder="Epasta adrese" required>
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Telefons:</label>
                <div class="col-sm-4">
                  <input type="tel" pattern="/(2|6|7)\d{8}/" class="form-control"  name="phone" placeholder="Telefona nr." required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="regnr">Reģistrācijas nr.:</label>
                <div class="col-sm-4">
                  <input type="number"  max="999999999999999999" class="form-control"  name="reg_num" placeholder="Klienta reģistrācijas nummurs..">
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Apstiprināt</button>
                </div>
              </div>
            </form>


       </div>

      <div class="panel-group" >

         <?php foreach($clients as $k => $client): ?>
            <div class="panel panel-default">
             <div class="panel-heading">
              
               <i style="color:#a6a6a6;" class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp; 
                <a style="color:#3d3d3d;font-weight: bold;" data-toggle="collapse" href="#collapse_<?php echo e($k); ?>">
                   <?php echo e($client['title']); ?>

                </a>
               
                <span class="label label-default" style="font-weight:normal;background-color: #9f9f9f;margin-left:20px;"><?php echo e($client['email']); ?></span>
                <span class="label label-default" style="font-weight:normal;background-color: #9f9f9f;"><?php echo e($client['phone']); ?></span>
                <span class="label label-default" style="font-weight:normal;background-color: #9f9f9f;"><?php echo e($client['reg_num']); ?></span>
               
               <div class="tool-bar-x"><button type="button" class="btn btn-default btn-xs"
               data-toggle="collapse" data-target="#edit_<?php echo e($client['id']); ?>" >Labot</button>
               <form style=' display: inline; ' method="POST" action="/workspace/deleteClient" >
               <?php echo csrf_field(); ?>

               <input type="hidden" name="id" value="<?php echo e($client['id']); ?>" ><button type="submit" class="btn btn-danger btn-xs">&#10006;</button></form></div>
             </div>



             <div id="collapse_<?php echo e($k); ?>" class="panel-collapse collapse <?php if(!$k): ?> in <?php endif; ?>">
               <div class="panel-body">
                  <div id="edit_<?php echo e($client['id']); ?>" class="panel-collapse collapse ">
                     <form class="form-horizontal" method="POST" action="/workspace/editClient">
                        <?php echo csrf_field(); ?>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Nosaukums:</label>
                            <div class="col-sm-4">
                              <input type="text"  maxlength="200" class="form-control" id="title" name="title" value="<?php echo e($client['title']); ?>" placeholder="Klienta nosaukums" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Epasts:</label>
                            <div class="col-sm-4"> 
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo e($client['email']); ?>" placeholder="Epasta adrese" required>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-sm-2" for="phone">Telefons:</label>
                            <div class="col-sm-4">
                              <input type="tel" pattern="/(2|6|7)\d{8}/" class="form-control" id="phone" name="phone" value="<?php echo e($client['phone']); ?>" placeholder="Telefona nr." required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="regnr">Reģistrācijas nr.:</label>
                            <div class="col-sm-4">
                              <input type="number" max="999999999999999999"  class="form-control" id="regnr" name="reg_num" value="<?php echo e($client['reg_num']); ?>" placeholder="Klienta reģistrācijas nummurs..">
                            </div>
                          </div>
                          <input type="hidden" name="id" value="<?php echo e($client['id']); ?>">
                          <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-default">Apstiprināt</button>
                            </div>
                          </div>
                        </form>
                         <div style="width:100%;height:10px;border-bottom:solid 1px #ccc;margin-bottom:10px;"> </div>
                     </div>
                       <span style='color:#000;'><i class="fa fa-shopping-basket" style='color:#8c8c8c;' aria-hidden="true"></i>&nbsp;&nbsp;Pasūtījumi
                       <button type="button" class="btn btn-success btn-xs get-id" id="<?php echo e($client['id']); ?>" data-toggle="modal" data-target="#modal_x"
                        >+&nbsp;Pievienot pasūtījumu</button><br></span>
                       <table class="table table-hover" style='color:#6d6d6d;'>
                         <thead>
                           <tr>
                           <th>#</th>
                             <th>Nosaukums</th>
                             <th>Apraksts</th>
                             <th>Cena</th>
                             <th>Iespējas</th>
                           </tr>
                         </thead>
                         <tbody>

                         <?php $iter=0; ?>
                         <?php foreach($orders as $n => $order): ?>

                           <?php if($client['id'] == $order['order_owner']): ?>
                              <?php $iter++;?>

                              <tr style="display: none;" id="eo_<?php echo e($order['order_id']); ?>">
                                 <form method="POST" action="/workspace/editOrder">
                                   <?php echo csrf_field(); ?>

                                    <td style="background-color: #fff2ce;text-align:center;vertical-align: middle;"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></td>
                                    <td style="background-color: #fff2ce;"> 
                                       <input type="text" maxlength="140" class="form-control input-sm"  name="title" value="<?php echo e($order['order_title']); ?>" placeholder="Pasūtījuma nosaukums" required>
                                    </td>
                                    <td style="background-color: #fff2ce;">
                                       <input type="text" class="form-control input-sm"  name="desc" value="<?php echo e($order['order_description']); ?>" maxlength="140" placeholder="Pasūtījuma apraksts[max 140]">
                                    </td>
                                    <td style="background-color: #fff2ce;">
                                       <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-sm"   name="price" value="<?php echo e($order['order_price']); ?>" placeholder="Cena">
                                    </td>
                                    <td style="background-color: #fff2ce;"> <input type="hidden" name="owner" value="<?php echo e($order['order_id']); ?>" >
                                     <button type="submit" class="btn btn-default ">Apstiprināt</button></td>
                                 </form>
                              </tr>

                              <tr>
                                <td><?php echo e($order['order_id']); ?></td>
                                <td><?php echo e($order['order_title']); ?></td>
                                <td><i><?php echo e($order['order_description']); ?></i></td>
                                <td><?php echo e(number_format((float)$order['order_price'], 2, '.', '')); ?> &euro;</td>

                                <td>
                                <div class="tool-bar-x" style="float:left;"><button type="button" class="btn btn-default btn-xs order_edit_triger"
                                 id="<?php echo e($order['order_id']); ?>">Labot</button>
                                 <form style=' display: inline; ' method="POST" action="/workspace/deleteOrder" >
                                 <?php echo csrf_field(); ?>

                                 <input type="hidden" name="id" value="<?php echo e($order['order_id']); ?>" ><button type="submit" class="btn btn-danger btn-xs">&#10006;</button></form></div></td>
                              </tr>
                           <?php endif; ?>

                           
                        <?php endforeach; ?>
                           <!-- If doesnt have orders-->
                           <?php if(!$iter): ?>
                               <tr><td colspan="5" style='text-align:center;color:red;font-size:12px;'>Nav pasūtījumu</td></tr>
                           <?php endif; ?>
                           <!--  -->
                         </tbody>
                       </table>
               </div>
             </div>
           </div>
         
           <div id="modal_x" class="modal fade" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Pasūtījumu pieņemšana</h4>
               </div>
               <div class="modal-body">
                  <form class="form-horizontal" method="POST" action="/workspace/addOrder">
                        <?php echo csrf_field(); ?>

                          <div class="form-group">
                            <label class="control-label col-sm-4" >Pasūtījuma nosaukums:</label>
                            <div class="col-sm-4">
                              <input type="text" maxlength="140" class="form-control"  name="title"  placeholder="Klienta nosaukums" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4" >Apraksts:</label>
                            <div class="col-sm-4"> 
                             
                               <textarea class="form-control"  name="desc" rows="5"  maxlength="140" placeholder="Apraksts par pasūtijumu" ></textarea>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-sm-4" >Cena:</label>
                            <div class="col-sm-4">
                              <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control"  name="price" placeholder="00.00">
                            </div>
                          </div>
                         
                          <input type="hidden" name="owner" class="set_owner">
                          <div class="form-group"> 
                            <div class="col-sm-offset-8 col-sm-2">
                              <button type="submit" class="btn btn-success">Apstiprināt</button>
                            </div>
                          </div>
                        </form>


               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Aizvērt</button>
               </div>
             </div>

           </div>
         </div>

         <?php endforeach; ?>

      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>