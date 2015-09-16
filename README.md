# SugarCRM 7 | Plivo Integration

A Plivo SMS API client. Integrated into SugarCRM

##### BETA

Please try it out, and let me know if things are working as expected.

##### [DOCS](http://fungku.github.io/hubspot-php/api/namespace-Fungku.HubSpot.Api.html)

## Setup

**Composer:**

```json
"require": {
	"fungku/hubspot-php": "~0.9@dev"
}
```

## Quickstart

#### Instantiate hubspot service

All following examples assume this step.

*Note:* The Hubspot class checks for a `HUBSPOT_API_KEY` environment variable if you don't include one during instantiation.

```php
$hubspot = Fungku\HubSpot\HubSpotService::make('api-key');
```

#### Get a single contact:

```php
$contact = $hubspot->contacts()->getByEmail("test@hubspot.com");
```

#### Paginate through all contacts:

```php
// Get an array of 10 contacts
// getting only the firstname and lastname properties
// and set the offset to 123456
$collection = $hubspot->contacts()->all([
        'count'     => 10,
        'property'  => ['firstname', 'lastname'],
        'vidOffset' => 123456,
]);

foreach ($collection['contacts'] as $contact) {
    echo $contact['properties']['firstname']['value'];
}

// Info for pagination
echo $collection['has-more'];
echo $collection['vid-offset'];
```

#### Get a group of contacts by Ids

```php
$vids = [196189, 196188, 196187];

// Get batch of contacts, and limit properties to firstname
$contacts = $hubspot->contacts()->getBatchByIds($vids, ['property' => 'firstname']);

foreach ($contacts as $contact) {
    echo $contact['properties']['firstname']['value'];
}
```

## Status

(:ballot_box_with_check: Complete, :wavy_dash: In Progress, :white_medium_small_square: Todo, :black_medium_small_square: Not planned)

If you see something not planned, that you want, make an [issue](https://github.com/fungku/hubspot-php/issues) and there's a good chance I will add it.

:black_medium_small_square: Account

:black_medium_small_square: Application

:black_medium_small_square: Call

:black_medium_small_square: Record

:black_medium_small_square: Conference

:black_medium_small_square: Endpoint

:ballot_box_with_check: Message

:black_medium_small_square: Number

:black_medium_small_square: Pricing

:black_medium_small_square: Recording
