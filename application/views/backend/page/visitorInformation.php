     
<br/><br/>
<div class="container ">

    <div class="row">
        <div class="col-sm-12 ">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Visitor Information</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                        










                        </div>
                        <div class="col-sm-12 col-md-4">
                              <table class="table">
                                <tr>
                                        <th>First Name: </th><td ><?= $visitor->vis_firstname?></td>
                                </tr>
                                 <tr>
                                        <th>Last Name: </th><td ><?= $visitor->vis_lastname?></td>
                                </tr>
                                 <tr>
                                        <th>E-mail Name: </th><td ><?= $visitor->vis_email?></td>
                                </tr>
                                 <tr>
                                        <th>Start Time: </th><td ><?= $visitor->vis_startvisit?></td>
                                </tr>
                                 <tr>
                                        <th>End Time: </th><td ><?= $visitor->vis_endvisit?></td>
                                </tr>
                                 <tr>
                                        <th>Joined: </th><td ><?= $visitor->created_at?></td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <hr>
                  



                </div></div>






        </div>
    </div>

</div>
