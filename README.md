# Plivo API Library

## Minimum Requirements

- php 7.1+

## Installation

`composer require dongilbert/plivo-php`

## Usage



## Laravel

While the basic usage is fine for non-Laravel environments, the additional functionality provided for Laravel
environments is extensive.

### Controller

Included in the extras for Laravel is a PlivoController + applicable routes that will allow you to get up and
running very quickly.

| Route | Name | Method | Parameters
| ----- | ---- | ------ | ----------
| /plivo/send/call | plivo.outbound.call | POST | sender => Your Plivo phone number, recipient => The person that should receive the call. (optional) forward => A number to use after connecting the original call. Useful for outbound calls via sales reps.  

### Events
| Event Name | Arguments | What you should do
| ---------- | --------- | ------------------
| CallAnswered | AnsweredCall, $forwardingNumber | In this event, you should set the response to Plivo so it knows what to do when handling the call. This could including checking the `$forwardingNumber` and connecting the original call recipient with a new recipient. 
| CallInitiated | Call, $args | Here you have access to the call API response from Plivo so you can log the UUID, as well as the original paramaters used to make the call. Useful for call team management.
