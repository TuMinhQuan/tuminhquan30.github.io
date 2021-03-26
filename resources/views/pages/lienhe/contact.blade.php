@extends('layout')
@section('content')
<div class="main-container col2-right-layout wow bounceInUp animated">
  <div class="main container">
    <div class="row">
               @foreach($contact as $key => $cont)
                  
      <section class="col-main col-sm-9">
        <div class="page-title">
          <h2>Contact Us</h2>
        </div>
    <aside class="col-right sidebar col-sm-3">
        <td>{!! $cont->info_contact !!}</td>
                      <td>{!! $cont->info_fanpage !!}</td>
      </aside>
     
        {{-- <div class="static-contain">
          <fieldset class="group-select">
            <ul>
              <li id="billing-new-address-form">
                <fieldset>
                  <legend>New Address</legend>
                  <input type="hidden" name="billing[address_id]" id="billing:address_id">
                  <ul>
                    <li>
                      <div class="customer-name">
                        <div class="input-box name-firstname">
                          <label for="billing:firstname"> First Name<span class="required">*</span></label>
                          <br>
                          <input type="text" id="billing:firstname" name="billing[firstname]" title="First Name" class="input-text ">
                        </div>
                        <div class="input-box name-lastname">
                          <label for="billing:lastname"> Email Address <span class="required">*</span> </label>
                          <br>
                          <input type="text" id="billing:lastname" name="billing[lastname]" title="Last Name" class="input-text">
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="input-box">
                        <label for="billing:company">Company</label>
                        <br>
                        <input type="text" id="billing:company" name="billing[company]" title="Company" class="input-text">
                      </div>
                      <div class="input-box">
                        <label for="billing:email">Telephone <span class="required">*</span></label>
                        <br>
                        <input type="text" name="billing[email]" id="billing:email" title="Email Address" class="input-text">
                      </div>
                    </li>
                    <li>
                      <label>Address <span class="required">*</span></label>
                      <br>
                      <input type="text" title="Street Address" name="billing[street][]" class="input-text">
                    </li>
                  
                    <li class="">
                      <label for="comment">Comment<em class="required">*</em></label>
                      <br>
                      <div style="float:none" class="">
                        <textarea name="comment" id="comment" title="Comment" class="input-text" cols="5" rows="3"></textarea>
                      </div>
                    </li>
                  </ul>
                </fieldset>
              </li>
              <li><span class="require"><em class="required">* </em>Required Fields</span>
              <div class="buttons-set">
                <button type="submit" title="Submit" class="button submit"> <span> Submit </span> </button>
              </div></li>
            </ul>
          </fieldset>
        </div> --}}
      </section>
      @endforeach
  
    </div>
  </div>
</div>

  <!-- Footer -->
  @endsection