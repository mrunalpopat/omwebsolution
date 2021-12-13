@extends('front.layouts.header')
@section('content')
<style type="text/css">
:root {
  --box-height: 40px;
  --border-radius: 5px;
  --space-between: 20px;
  --font-size: 16px;

  --color-0: #ffffff;
  --color-1: #dcdcdd;
  --color-2: #c5c3c6;
  --color-3: #212529;
  --color-4: #659b5e;
  --color-5: #ce4257;
}

body {
  background-image: url("https://i.postimg.cc/BnhHF28S/nastuh-abootalebi-y-Wwob8kw-OCk-unsplash-modified.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center center;
}

#survey-container {
  margin: 20px auto;
  padding: 30px 20px;
  width: 100%;
  max-width: 840px;
  border-radius: calc(3 * var(--border-radius));
}

#title {
  margin: 30px 0;
  text-align: center;
  font-size: 50px;
  text-transform: capitalize;
  color: var(--color-3);
}

#description {
  margin: 30px 0;
  padding: 5px;
  text-align: center;
  font-size: 22px;
  font-weight: bold;
  color: var(--color-3);
}

#survey-form {
  padding: 30px;
  padding-top: 20px;
  background: var(--color-1);
  opacity: 98%;
  border: none;
  border-radius: calc(2 * var(--border-radius));
}

#survey-form * {
  font-size: var(--font-size);
}

.row-label,
.row-input {
  padding: 5px 10px;
  margin: 0;
  height: var(--box-height);
  width: 100%;
  display: block;
}

.row-label {
  color: var(--color-3);
  font-weight: 600;
}

.row-label:not(:first-child) {
  margin-top: var(--space-between);
}

.row-input:not(.small) {
  background: white;
  border: none;
  border-radius: var(--border-radius);
}

.inline-label {
  margin-left: 10px;
  font-size: 14px;
  color: var(--color-3);
}

.small {
  height: calc(var(--box-height) * 0.75);
}

#comments {
  padding: 10px;
  margin: 0;
  height: 120px;
  width: 100%;
  background: white;
  border: none;
  border-radius: var(--border-radius);
  resize: none;
}

#submit {
  margin-top: calc(2 * var(--space-between));
  height: var(--box-height);
  width: 100%;
  background: #106eea;
  border: none;
  border-radius: var(--border-radius);
  color: white;
  font-weight: 600;
  cursor: pointer;
  text-transform: capitalize;
}

#submit:hover {
  box-shadow: 0 0 2px #F2702F;
  background: #F2702F;
}

</style>
 
<div class="container">
    <h1 id="title">Job form</h1>
    <p id="description">Fill in to apply</p>
    <form id="survey-form" action="{{route('addcareer')}}" method="post" enctype="multipart/form-data">
    @csrf

        <label id="name-label" class="row-label" for="name">Full Name:</label>
        <input id="name" class="row-input" type="text" name="fullname" placeholder="Enter your name" required>

        <label id="email-label" class="row-label" for="email">Email:</label>
        <input id="email" class="row-input" type="email" name="email" placeholder="Enter your email" required>

        <label class="row-label" for="dropdown">Level of education:</label>
        <select id="dropdown" name="education" class="row-input" required>
            <option disabled selected>Select an option</option>
            <option value="primary">Primary education</option>
            <option value="secondary">Secondary education</option>
            <option value="higher">Higher education</option>
            <option value="na">No answer</option>
        </select>

        <label id="number-label" class="row-label" for="number">Years of experience (optional):</label>
        <input id="number" class="row-input" type="number" name="experience" placeholder="Enter number of years of experience" min="0" max="50">

        <label id="name-label" class="row-label" for="name">Current Salary:</label>
        <input id="name" class="row-input" type="text" name="c_salary" placeholder="Enter your Current Salary" required>
   
        <p class="row-label">Expected salary:</p>

        <label class="row-input small" for="below-3k">
            <input type="radio" id="below-3k" name="e_salary" value="below-3k">
            <span class="inline-label">Below $3K</span>
        </label>

        <label class="row-input small" for="3k-4k">
            <input type="radio" id="3k-4k" name="e_salary" value="3k-4k">
            <span class="inline-label">$3K - $4K</span>
        </label>

        <label class="row-input small" for="4k-5k">
            <input type="radio" id="4k-5k" name="e_salary" value="4k-5k">
            <span class="inline-label">$4K - $5K</span>
        </label>

        <label class="row-input small" for="above-5k">
            <input type="radio" id="above-5k" name="e_salary" value="above-5k">
            <span class="inline-label">Above $5K</span>
        </label>

        <label class="row-input small" for="dont-know">
            <input type="radio" id="dont-know" name="e_salary" value="dont know">
            <span class="inline-label">Don't know</span>
        </label>

    	<label class="row-label" for="comments">Reason for leave job:</label>
        <textarea id="comments" name="reason" placeholder="Enter Reason for leave job"></textarea>

        <label class="row-label" for="comments">Upload Resume</label>
        <input type="file" name="upload">

        <label id="name-label" class="row-label" for="name">Country:</label>
        <input id="name" class="row-input" type="text" name="country" placeholder="Enter your Country" required>

        <label id="name-label" class="row-label" for="name">State:</label>
        <input id="name" class="row-input" type="text" name="state" placeholder="Enter your state" required>

        <label id="name-label" class="row-label" for="name">City:</label>
        <input id="name" class="row-input" type="text" name="city" placeholder="Enter your city" required>

        <label class="row-label" for="comments">Additional informations:</label>
        <textarea id="comments" name="extra" placeholder="Enter other informations here..."></textarea>
 
        <button id="submit" type="submit">Submit</button>
    </form>
    <br>
</div>
@endsection