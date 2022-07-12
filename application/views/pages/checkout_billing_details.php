<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Checkout</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="span9">
            <h1 class="heading1"><span class="maintext">Checkout</span><span class="subtext"> Checkout Process Steps</span></h1>
            
            <div class="checkoutsteptitle">Step 2: Billing Details<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="row">
              <form class="form-horizontal">
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >First Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Last Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Telephone<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Fax</label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Telephone<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Password<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Password Confirm<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                  </div>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Company</label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Company Id</label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Address 1<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Address 2</label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >City<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Post Code<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class=""  value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Country<span class="red">*</span></label>
                      <div class="controls">
                        <select >
                          <option>Please Select</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Region / State<span class="red">*</span></label>
                      <div class="controls">
                        <select >
                          <option>Please Select</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
            <a class="btn btn-orange pull-right">Continue</a>
          </div>
        </div>        
        
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Tahapan Checkout</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a href="<?=base_url('checkout')?>">Checkout</a>
                </li>
                <li>
                  <a class="active" href="<?=base_url('checkout/detail_pembeli')?>">Detail Pembeli</a>
                </li>
                <li>
                  <a href="<?=base_url('checkout/detail_pengiriman')?>">Detail Pengiriman</a>
                </li>
                <li>
                  <a href="<?=base_url('checkout/detail_pesanan')?>">Detail Pesanan</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>