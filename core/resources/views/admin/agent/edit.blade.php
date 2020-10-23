@extends('admin.layout.master')
@section('import-css')
@stop
@section('body')

    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <a href="{{route('agent.index')}}" class="btn btn-success btn-md float-right">
                <i class="fa fa-users"></i> All Agents
            </a>
        </div>

        <form role="form" method="POST" action="{{route('agent.update',$data)}}" name="editForm" enctype="multipart/form-data">
            {{method_field('put')}}
            {{ csrf_field() }}

            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">First name</label>
                        <input type="text" name="first_name"
                               class="form-control form-control-lg @if ($errors->has('first_name'))  is-invalid @endif"
                               placeholder="First name" value="{{$data->first_name}}">
                        @if ($errors->has('first_name'))
                            <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">Last name</label>
                        <input type="text" name="last_name"
                               class="form-control form-control-lg  @if ($errors->has('last_name'))  is-invalid @endif"
                               placeholder="Last name" value="{{$data->last_name}}">
                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Company Name</label>
                        <input type="text" name="company_name" value="{{$data->company_name}}"
                               class="form-control form-control-lg @if ($data->company_name) is-invalid @endif"
                               placeholder="Company Name" aria-describedby="inputGroupPrepend3">
                        @if ($errors->has('company_name'))
                            <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Username</label>
                        <input type="text" name="username"
                               class="form-control form-control-lg @if ($errors->has('username'))  is-invalid @endif"
                               placeholder="Username" value="{{$data->username}}">
                        @if ($errors->has('username'))
                            <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone"
                               class="form-control form-control-lg  @if ($errors->has('phone'))  is-invalid @endif"
                               placeholder="Phone Number" value="{{$data->phone}}">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>E-mail</label>
                        <input type="email" name="email" value="{{$data->email}}"
                               class="form-control form-control-lg @if ($errors->has('email')) is-invalid @endif"
                               placeholder="E-mail Address">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Password</label>
                        <input type="password" name="password" value="" class="form-control form-control-lg @if ($errors->has('password')) is-invalid @endif" placeholder="Enter Password">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Profile</label>
                        <input type="file" name="picture"
                               class="form-control  @if ($errors->has('picture'))  is-invalid @endif">
                        @if ($errors->has('picture'))
                            <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Picture document</label>
                        <input type="file" name="pic_document"
                               class="form-control  @if ($errors->has('pic_document'))  is-invalid @endif">
                        @if ($errors->has('pic_document'))
                            <div class="invalid-feedback">{{ $errors->first('pic_document') }}</div>
                        @endif
                    </div>


                    
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Present Address</label>
                        <textarea name="present_address" value="{{old('present_address')}}"
                                  class="form-control form-control-lg @if ($errors->has('present_address')) is-invalid @endif"
                                  placeholder="Present address">{{$data->present_address}}</textarea>
                        @if ($errors->has('present_address'))
                            <div class="invalid-feedback">{{ $errors->first('present_address') }}</div>
                        @endif
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Permanent Address</label>
                        <textarea name="permanent_address" value="{{old('permanent_address')}}"
                                  class="form-control form-control-lg @if ($errors->has('permanent_address')) is-invalid @endif"
                                  placeholder="Permanent address">{{$data->permanent_address}}</textarea>
                        @if ($errors->has('permanent_address'))
                            <div class="invalid-feedback">{{ $errors->first('permanent_address') }}</div>
                        @endif
                    </div>
                </div>


                <div class="form-row">

                    <div class="col-md-3 mb-3">
                        <label>City</label>
                        <input type="text" name="city" value="{{$data->city}}" class="form-control @if ($errors->has('city')) is-invalid @endif" placeholder="City">
                        @if ($errors->has('city'))
                            <div class="invalid-feedback">{{ $errors->first('city') }}</div>
                        @endif
                    </div>


                    <div class="col-md-3 mb-3">
                        <label>Zip code</label>
                        <input type="text" name="zip_code" value="{{$data->zip_code}}"
                               class="form-control  @if ($errors->has('zip_code')) is-invalid @endif"
                               placeholder="Zip Code">
                        @if ($errors->has('zip_code'))
                            <div class="invalid-feedback">{{ $errors->first('zip_code') }}</div>
                        @endif
                    </div>


                    <div class="col-md-3 mb-3">
                        <label>Country</label>

                        <select name="country" id="country" class="form-control" style="width: 100%" data-live-search="true">
                            <option value="">Select Country</option>

                            <option value="Afganistan" rel="">Afghanistan</option>
                            <option value="Albania" rel="">Albania</option>
                            <option value="Algeria" rel="">Algeria</option>
                            <option value="American Samoa" rel="">American Samoa</option>
                            <option value="Andorra" rel="">Andorra</option>
                            <option value="Angola" rel="">Angola</option>
                            <option value="Anguilla" rel="">Anguilla</option>
                            <option value="Antigua &amp; Barbuda" rel="">Antigua &amp; Barbuda</option>
                            <option value="Argentina" rel="">Argentina</option>
                            <option value="Armenia" rel="">Armenia</option>
                            <option value="Aruba" rel="">Aruba</option>
                            <option value="Australia" rel="">Australia</option>
                            <option value="Austria" rel="">Austria</option>
                            <option value="Azerbaijan" rel="">Azerbaijan</option>
                            <option value="Bahamas" rel="">Bahamas</option>
                            <option value="Bahrain" rel="">Bahrain</option>
                            <option value="Bangladesh" rel="">Bangladesh</option>
                            <option value="Barbados" rel="">Barbados</option>
                            <option value="Belarus" rel="">Belarus</option>
                            <option value="Belgium" rel="">Belgium</option>
                            <option value="Belize" rel="">Belize</option>
                            <option value="Benin" rel="">Benin</option>
                            <option value="Bermuda" rel="">Bermuda</option>
                            <option value="Bhutan" rel="">Bhutan</option>
                            <option value="Bolivia" rel="">Bolivia</option>
                            <option value="Bonaire" rel="">Bonaire</option>
                            <option value="Bosnia &amp; Herzegovina" rel="">Bosnia &amp; Herzegovina</option>
                            <option value="Botswana" rel="">Botswana</option>
                            <option value="Brazil" rel="">Brazil</option>
                            <option value="British Indian Ocean Ter" rel="">British Indian Ocean Ter</option>
                            <option value="Brunei" rel="">Brunei</option>
                            <option value="Bulgaria" rel="">Bulgaria</option>
                            <option value="Burkina Faso" rel="">Burkina Faso</option>
                            <option value="Burundi" rel="">Burundi</option>
                            <option value="Cambodia" rel="">Cambodia</option>
                            <option value="Cameroon" rel="">Cameroon</option>
                            <option value="Canada" rel="">Canada</option>
                            <option value="Canary Islands" rel="">Canary Islands</option>
                            <option value="Cape Verde" rel="">Cape Verde</option>
                            <option value="Cayman Islands" rel="">Cayman Islands</option>
                            <option value="Central African Republic" rel="">Central African Republic</option>
                            <option value="Chad" rel="">Chad</option>
                            <option value="Channel Islands" rel="">Channel Islands</option>
                            <option value="Chile" rel="">Chile</option>
                            <option value="China" rel="">China</option>
                            <option value="Christmas Island" rel="">Christmas Island</option>
                            <option value="Cocos Island" rel="">Cocos Island</option>
                            <option value="Colombia" rel="">Colombia</option>
                            <option value="Comoros" rel="">Comoros</option>
                            <option value="Congo" rel="">Congo</option>
                            <option value="Cook Islands" rel="">Cook Islands</option>
                            <option value="Costa Rica" rel="">Costa Rica</option>
                            <option value="Cote DIvoire" rel="">Cote D'Ivoire</option>
                            <option value="Croatia" rel="">Croatia</option>
                            <option value="Cuba" rel=""> Cuba</option>
                            <option value="Curaco" rel="">Curacao</option>
                            <option value="Cyprus" rel="">Cyprus</option>
                            <option value="Czech Republic" rel="">Czech Republic</option>
                            <option value="Denmark" rel="">Denmark</option>
                            <option value="Djibouti" rel="">Djibouti</option>
                            <option value="Dominica" rel="">Dominica</option>
                            <option value="Dominican Republic" rel="">Dominican Republic</option>
                            <option value="East Timor" rel="">East Timor</option>
                            <option value="Ecuador" rel="">Ecuador</option>
                            <option value="Egypt" rel="">Egypt</option>
                            <option value="El Salvador" rel="">El Salvador</option>
                            <option value="Equatorial Guinea" rel="">Equatorial Guinea</option>
                            <option value="Eritrea" rel="">Eritrea</option>
                            <option value="Estonia" rel="">Estonia</option>
                            <option value="Ethiopia" rel="">Ethiopia</option>
                            <option value="Falkland Islands" rel="">Falkland Islands</option>
                            <option value="Faroe Islands" rel="">Faroe Islands</option>
                            <option value="Fiji" rel="">Fiji</option>
                            <option value="Finland" rel="">Finland</option>
                            <option value="France" rel="">France</option>
                            <option value="French Guiana" rel="">French Guiana</option>
                            <option value="French Polynesia" rel="">French Polynesia</option>
                            <option value="French Southern Ter">French Southern Ter</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany" rel="">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Great Britain">Great Britain</option>
                            <option value="Greece" rel="">Greece</option>
                            <option value="Greenland" rel="">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong" rel="">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India" rel="">India</option>
                            <option value="Indonesia" rel="">Indonesia</option>
                            <option value="Iran"> rel=""Iran</option>
                            <option value="Iraq" rel="">Iraq</option>
                            <option value="Ireland" rel="">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy" rel="">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan" rel="">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya" rel="">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea North" rel="">Korea North</option>
                            <option value="Korea Sout" rel="">Korea South</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Midway Islands">Midway Islands</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Nambia">Nambia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherland Antilles">Netherland Antilles</option>
                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                            <option value="Nevis">Nevis</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau Island">Palau Island</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Phillipines" rel="">Philippines</option>
                            <option value="Pitcairn Island">Pitcairn Island</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar" rel="">Qatar</option>
                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                            <option value="Republic of Serbia" rel="">Republic of Serbia</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia" rel="">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="St Barthelemy">St Barthelemy</option>
                            <option value="St Eustatius">St Eustatius</option>
                            <option value="St Helena">St Helena</option>
                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                            <option value="St Lucia">St Lucia</option>
                            <option value="St Maarten">St Maarten</option>
                            <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                            <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                            <option value="Saipan">Saipan</option>
                            <option value="Samoa">Samoa</option>
                            <option value="Samoa American">Samoa American</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore" rel="">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa" rel="">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka" rel="">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden" rel="">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Tahiti">Tahiti</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand" rel="">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Erimates" rel="">United Arab Emirates</option>
                            <option value="United Kingdom" rel="">United Kingdom</option>
                            <option value="United States of America" rel="">United States of America</option>
                            <option value="Uraguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City State" rel="">Vatican City State</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                            <option value="Wake Island">Wake Island</option>
                            <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                            <option value="Yemen" rel="">Yemen</option>
                            <option value="Zaire">Zaire</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>


                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%"
                               type="checkbox" @if($data->status  == 1) checked @endif name="status">
                    </div>
                </div>

            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary btn-block btn-lg" type="submit">Save</button>
            </div>

        </form>
    </div>

@endsection

@section('import-script')
@stop
@section('script')
    <script>
        document.forms['editForm']['country'].value = "{{$data->country}}";
    </script>

@stop