    <!-- Address details modal start  -->
    <button class="pickup-btn" data-toggle="modal" data-target="#pickupStations" style="display:none;">click</button>
    <div class="modal fade" id="addressDetails">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <span style="font-weight:600;font-size:20px;">Shipping Address <i class="fa fa-map-marker" style="color:crimson;"></i></span>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <!-- Modal body -->
                <div class="modal-body">

                    <!-- firstname and last name-->
                    <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                        <div class="" style="margin-right:7px !important;width:45%;">FirstName</div>
                        <div class="" style="width:45%;padding-left:10px;">LastName</div>
                    </div>
                    <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                        <input type="text" class="form-control col-sm-6 col-xs-6" style="margin-right:7px !important;" placeholder="">
                        <input type="text" class="form-control col-sm-6 col-xs-6" style="" placeholder="">
                    </div>




                    <!-- Phone Numbers-->
                    <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                        <div class="" style="margin-right:7px !important;width:45%;">Phone No.</div>
                        <div class="" style="width:45%;padding-left:10px;">Additional No.</div>
                    </div>
                    <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                        <input type="text" class="form-control col-sm-6 col-xs-6" style="margin-right:7px !important;" placeholder="">
                        <input type="text" class="form-control col-sm-6 col-xs-6" style="" placeholder="">
                    </div>
                    <br>

                    <!-- address -->
                    <div style="width:100%;padding:10px;">
                        <label>Address</label>
                        <textarea class="form-control"></textarea>
                    </div>




                    <!-- Country and city-->
                    <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                        <div class="" style="margin-right:7px !important;width:45%;">Country</div>
                        <div class="" style="width:45%;padding-left:10px;">City</div>
                    </div>

                    <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                        <!-- country -->
                        <select class="form-control col-sm-6 col-xs-6" style="margin-right:10px;">
                            <option>Nigeria</option>
                        </select>
                        <!-- city -->
                        <select class="form-control col-sm-6 col-xs-6">
                            <option>Port-harcourt</option>
                        </select>
                    </div>
                    <br>

                    <!-- save btn -->
                    <div style="width:100%;display:flex;justify-content:center;">
                        <button type="submit" class="save-address-btn" style="padding:10px;border:none;background-color:crimson;color:white;border-radius:3px;">Save Address</button>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- address details modal end -->