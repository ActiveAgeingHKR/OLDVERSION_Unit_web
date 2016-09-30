<?php

/* 
 *  @package		Kodstack
 *  Author:                Ronash Dhakal
 *  @copyright		Copyright (c) 2015 - 2016, Kodstack Lab, Reg:98/0821 Malmo, Sweden.
 *  @link                  http://www.kodstack.com
 */

?>
<div class="row light">
    <br/>
                <div class="col-md-12">
                
                    <table  id="miccUsers" class="table table-striped table-responsive hidden-xs">
                        <thead>
                            <tr>
                                <th>E-mail</th>
                               <th>Username</th>
                                <?php
                                if($type=='group'){
                                    echo '<th>Remove</th>';
                                }else{
                                    echo '<th>Ban</th>';
                                }
                                ?>
                                
                                <th>Last Login</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listUsers as $user) {
                                if($type=='group'){
                                   if($user->id!=1){
                                        $ban = '<button class="btn btn-danger" onclick="removeMember('.$user->id.')" >Remove member</button';
                                   }else{
                                       $ban = 'Super Admin';
                                   }
                                }else{
                                   
                                    if($user->banned == 1 ){
                                        $ban = '<button class="button" onclick="unBannUser('.$user->id.')" >Unbanned User</button';
                                    }else if($this->aauth->is_admin($user->id)!=TRUE){
                                        $ban = '<button class="btn btn-danger" onclick="bannUser('.$user->id.')" >Band User</button';
                                    }else{
                                        $ban = '';
                                    }
                                
                                }
                                echo ''
                                . '<tr>'
                               
                                . '<td>' . $user->email . '</td>'
                              
                                . '<td>' . $user->username . '</td>'
                                . '<td>' . $ban . '</td>'
                                . '<td>' . $user->last_login . '</td>'
                                . '</tr>';
                            }
                            ?>
                        </tbody>
                    </table> 
                    <p class="visible-xs hidden-sm text-center">Sorry your device eligible to view user details!</p>
                </div>
<br/>
            </div>