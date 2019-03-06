<div class="row mt-4 mb-4">
    <div class="col">
         
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.tests.name'))->class('col-md-2 form-control-label')->for('name') }}
            <div class="col-md-10">
                
                        {{ html()->text('name')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.backend.tests.name'))
                        
                        
                      
                            ->required() 
                         }}
                

            </div><!--col-->
        </div><!--form-group-->
        
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.tests.email'))->class('col-md-2 form-control-label')->for('email') }}
            <div class="col-md-10">
                
                        {{ html()->email('email')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.backend.tests.email'))
                        
                        
                      
                            ->required() 
                         }}
                

            </div><!--col-->
        </div><!--form-group-->
        
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.tests.sms'))->class('col-md-2 form-control-label')->for('sms') }}
            <div class="col-md-10">
                
                        {{ html()->textarea('sms')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.backend.tests.sms'))
                        
                        
                      
                         }}
                

            </div><!--col-->
        </div><!--form-group-->
        

        <!--end-columns-->
             



    </div><!--col-->
</div><!--row-->