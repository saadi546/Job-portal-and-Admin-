@extends('layouts.adminmaster')

@section('content')

<div class="container">
    <h1 class="mb-4">Admin Create Job</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post a Job') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jobs.post') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="job_image" class="col-md-4 col-form-label text-md-right">{{ __('Job Image') }}</label>
                            <div class="col-md-6">
                                
                                <input id="job_image" type="file" name="job_image" class="form-control-file @error('job_image') is-invalid @enderror">

                                @error('job_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>
                            <div class="col-md-6">
                                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autofocus>
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                

                        <div class="form-group row">
                            <label for="job_location" class="col-md-4 col-form-label text-md-right">{{ __('Job Location') }}</label>
                            <div class="col-md-6">
                                <select id="job_location" class="form-control @error('job_location') is-invalid @enderror" name="job_location">
                                    <option value="">Select Location</option>
                                    <option value="usa" {{ old('job_location') === 'usa' ? 'selected' : '' }}>Usa</option>
                                    <option value="new york" {{ old('job_location') === 'new york' ? 'selected' : '' }}>New York</option>
                                    <option value="canada" {{ old('job_location') === 'canada' ? 'selected' : '' }}>Canada</option>
                                    <option value="uk" {{ old('job_location') === 'uk' ? 'selected' : '' }}>UK</option>
                                    <option value="pakistan" {{ old('job_location') === 'pakistan' ? 'selected' : '' }}>Pakistan</option>
                                    <option value="washington" {{ old('job_location') === 'washington' ? 'selected' : '' }}>Washington</option>
                                    <!-- Add more location options as needed -->
                                </select>
                                @error('job_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="published_date" class="col-md-4 col-form-label text-md-right">{{ __('Published Date') }}</label>
                            <div class="col-md-6">
                                <input id="published_date" type="date" class="form-control @error('published_date') is-invalid @enderror" name="published_date" value="{{ old('published_date') }}">
                                @error('published_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>
                            <div class="col-md-6">
                                <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}">
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job_nature" class="col-md-4 col-form-label text-md-right">{{ __('Job Nature') }}</label>
                            <div class="col-md-6">
                                <select id="job_nature" class="form-control @error('job_nature') is-invalid @enderror" name="job_nature">
                                    <option value="full_time" {{ old('job_nature') === 'full_time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ old('job_nature') === 'part_time' ? 'selected' : '' }}>Part Time</option>
                                </select>
                                @error('job_nature')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                
                
                        <div class="form-group row">
                            <label for="job_description" class="col-md-4 col-form-label text-md-right">{{ __('Job Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="job_description" class="form-control @error('job_description') is-invalid @enderror" name="job_description" rows="4">{{ old('job_description') }}</textarea>
                                @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="responsibility" class="col-md-4 col-form-label text-md-right">{{ __('Responsibility') }}</label>
                            <div class="col-md-6">
                                <textarea id="responsibility" class="form-control @error('responsibility') is-invalid @enderror" name="responsibility" rows="4">{{ old('responsibility') }}</textarea>
                                @error('responsibility')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="job_summary" class="col-md-4 col-form-label text-md-right">{{ __('Job Summary') }}</label>
                            <div class="col-md-6">
                                <textarea id="job_summary" class="form-control @error('job_summary') is-invalid @enderror" name="job_summary" rows="4">{{ old('job_summary') }}</textarea>
                                @error('job_summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="company_details" class="col-md-4 col-form-label text-md-right">{{ __('Company Details') }}</label>
                            <div class="col-md-6">
                                <textarea id="company_details" class="form-control @error('company_details') is-invalid @enderror" name="company_details" rows="4">{{ old('company_details') }}</textarea>
                                @error('company_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualifications" class="col-md-4 col-form-label text-md-right">{{ __('Qualifications') }}</label>
                            <div class="col-md-6">
                                <select id="qualifications" class="form-control @error('qualifications') is-invalid @enderror" name="qualifications">
                                    <option value="graduate" {{ old('qualifications') === 'graduate' ? 'selected' : '' }}>Graduate</option>
                                    <option value="undergraduate" {{ old('qualifications') === 'undergraduate' ? 'selected' : '' }}>Under Graduate</option>
                                </select>
                                @error('qualifications')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                
                        {{-- <div class="form-group row">
                            <label for="qualifications" class="col-md-4 col-form-label text-md-right">{{ __('Qualifications') }}</label>
                            <div class="col-md-6">
                                <textarea id="qualifications" class="form-control @error('qualifications') is-invalid @enderror" name="qualifications" rows="4">{{ old('qualifications') }}</textarea>
                                @error('qualifications')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post Job') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
