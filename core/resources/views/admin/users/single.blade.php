@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            @include('errors.error')
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    <h2><i class="fa fa-user"></i> Profile</h2>
                </div>


                <div class="card-body">
                    <label>Profile Pic</label>
                    @if( $user->image)
                        <img src=" {{url('assets/images/user/'.$user->image)}} " class="pop img-responsive propic"
                             alt="Profile Pic" width="100%">
                    @else

                        <img src=" {{url('assets/user/images/user-default.png')}} " class="img-responsive propic"
                             alt="Profile Pic" width="100%">
                    @endif
                    <label>CNIC Pic</label>
                    @if( $user->cnic_pic)
                        <img src=" {{url('assets/images/cnic_pic/'.$user->cnic_pic)}} " class="pop img-responsive propic"
                             alt="cnic_pic" width="100%">
                    @else

                        <img src=" {{url('assets/images/cnic_pic/cnic_pic.jpg')}} " class="img-responsive propic"
                             alt="cnic_pic" width="100%">
                    @endif
                    <label>Driver Licence Pic</label>
                    @if( $user->driver_licence)
                        <img src=" {{url('assets/images/driver_licence/'.$user->driver_licence)}} " class="pop img-responsive propic"
                             alt="driver_licence" width="100%">
                    @else

                        <img src=" {{url('assets/images/driver_licence/driver_licence.png')}} " class="img-responsive propic"
                             alt="driver_licence" width="100%">
                    @endif
                    <hr>
                    <p>User Name : <strong>{{ $user->username }}</strong></p>
                    <p>Name : <strong> {{$user->fname}} {{$user->lname}}</strong></p>

                    <p>
                        <strong>Last Login : {{ Carbon\Carbon::parse($user->login_time)->diffForHumans() }}</strong>
                        <br>
                    </p>
                    <hr>
                    @if($last_login != null)

                        <strong>Last Login From</strong> <br> {{ $last_login->user_ip }} -  {{ $last_login->location }}
                        <br> Using {{ $last_login->details }} <br>

                    @endif
                </div>
            </div>

        </div>


        <div class="col-md-9">

            <h4 class="mb-4"><i class="fa fa-chart-line"></i> History</h4>
            <div class="row mb-4">
                <div class="col-md">
                    <a href="{{route('user.trans',$user->id)}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-primary text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa fa-3x fa-fw fa-exchange-alt"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">TRANSACTION</p>
                                <h3 class="font-weight-bold mb-0">History</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md">
                    <a href="{{route('user.deposit',$user->id)}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-success text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fas fa-fw fa-3x  fa-money-bill-alt"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">DEPOSITS</p>
                                <h3 class="font-weight-bold mb-0">History</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="{{route('user.withdraw',$user->id)}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-info text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa-3x fa-fw fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">WithDraw</p>
                                <h3 class="font-weight-bold mb-0">History</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <h4 class="mb-4"><i class="fa fa-cogs"></i> Operations</h4>
            <div class="row mb-4">
                <div class="col-md">
                    <a href="{{route('user.login.history',$user->id)}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-info text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa-3x fa-fw fas fa-sign-in-alt"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">Login</p>
                                <h3 class="font-weight-bold mb-0">History</h3>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-md">
                    <a href="{{route('user.email',$user->id)}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-info text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa-3x fa-fw fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">Send</p>
                                <h3 class="font-weight-bold mb-0">Email</h3>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-md">
                    <a data-toggle="modal" data-target="#changepass" class="textDecoration" style="cursor: pointer">
                        <div class="d-flex border">
                            <div class="bg-info text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa-3x fa-fw fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">Change </p>
                                <h3 class="font-weight-bold mb-0">Password</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


        


            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            <h2><i class="fa fa-user"></i> Update Profile</h2>
                        </div>

                        <div class="card-body">

                            <form id="form" method="POST" action="{{route('user.status', $user->id)}}"
                                  enctype="multipart/form-data" name="editForm">
                                {{ csrf_field() }}
                                {{method_field('put')}}

                                <div class="row">
                                    <div class="form-group col-md-6 {{ $errors->has('fname') ? ' has-error' : '' }}">
                                        <label> <strong>Name</strong></label>
                                        <input type="text" name="fname" class="form-control form-control-lg"
                                               value="{{$user->fname}}">
                                        @if ($errors->has('fname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 {{ $errors->has('lname') ? ' has-error' : '' }}">
                                        <label> <strong>Last Name</strong></label>
                                        <input type="text" name="lname" class="form-control form-control-lg"
                                               value="{{$user->lname}}">
                                        @if ($errors->has('lname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label><strong>Phone</strong></label>
                                        <input type="text" name="phone" class="form-control form-control-lg"
                                               value="{{$user->phone}}">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control form-control-lg"
                                               value="{{$user->email}}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="form-group col-md-4 ">
                                        <label> <strong>City</strong></label>
                                        <input type="text" name="city" class="form-control form-control-lg"
                                               value="{{$user->city}}">

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Zip Code</strong></label>
                                        <input type="text" name="zip_code" class="form-control form-control-lg"
                                               value="{{$user->zip_code}}">

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Address</strong></label>
                                        <input type="text" name="address" class="form-control form-control-lg"
                                               value="{{$user->address}}">

                                    </div>

                                    <div class="form-group col-md-12 ">
                                        <label><strong>Country</strong></label>

                                        <select name="country"class="form-control select form-control-lg"id="country">
                                            <option value="">Select Country</option>
                                            <option value="United States">United States</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic
                                            </option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The
                                                Democratic
                                                Republic of The
                                            </option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                            </option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and
                                                Mcdonald
                                                Islands
                                            </option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                            </option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                People's Republic of
                                            </option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                Republic
                                            </option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia,
                                                The
                                                Former Yugoslav Republic of
                                            </option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated
                                                States
                                                of
                                            </option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands
                                            </option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                Occupied
                                            </option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                            </option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                Grenadines
                                            </option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South
                                                Georgia
                                                and The South Sandwich Islands
                                            </option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China">Taiwan, Province of China
                                            </option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic
                                                of
                                            </option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                            </option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor
                                                Outlying Islands
                                            </option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label><strong>User Status</strong></label>
                                        <input class="form-control form-control-lg" data-toggle="toggle"
                                               data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Active"
                                               data-off="Deactive" type="checkbox" value="1"
                                               name="status" {{ $user->status == "1" ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label><strong>Image Verification</strong></label>
                                        <input class="form-control form-control-lg" data-toggle="toggle"
                                               data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Yes"
                                               data-off="No" type="checkbox" value="1"
                                               name="image_verify" {{ $user->image_verify == "1" ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label><strong>CNIC Verification</strong></label>
                                        <input class="form-control form-control-lg" data-toggle="toggle"
                                               data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Yes"
                                               data-off="No" type="checkbox" value="1"
                                               name="cnic_verify" {{ $user->cnic_verify == "1" ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label><strong>Driver Licence Verification</strong></label>
                                        <input class="form-control form-control-lg" data-toggle="toggle"
                                               data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Yes"
                                               data-off="No" type="checkbox" value="1"
                                               name="driver_licence_verify" {{ $user->driver_licence_verify == "1" ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label><strong>Email Verification</strong></label>
                                        <input class="form-control form-control-lg" data-toggle="toggle"
                                               data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Yes" data-off="No"
                                               type="checkbox" value="1"
                                               name="email_verify" {{ $user->email_verify == "1" ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Phone Verification</strong></label>
                                        <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Yes" data-off="No"
                                               type="checkbox" value="1"
                                               name="phone_verify" {{ $user->phone_verify == "1" ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- Modal for Edit button -->
    <div id="changepass" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><strong>Change Password</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('user.passchange', $user->id)}}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('put')}}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label"><strong>Password</strong></label>
                            <input id="password" type="password" class="form-control form-control-lg" name="password"
                                   placeholder="Passowrd"
                                   required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label"><strong>Confirm
                                    Password</strong></label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg"
                                   placeholder="Confirm Passowrd"
                                   name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Image preview</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
          </div>
          <div class="modal-body">
            <img src="" id="imagepreview" style="width:100%" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        document.forms['editForm'].elements['country'].value = "{{$user->country}}";
        $(".pop").on("click", function() {
           $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
           $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        });
    </script>

@endsection

