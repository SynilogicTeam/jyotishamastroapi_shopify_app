# Jyotisham Astro Theme Extension

A comprehensive Shopify theme extension for Jyotisham Astro API integration, providing Kundali generation, Panchang widgets, and Kundali matching functionality.

## Features

### 🌟 Kundali Generator
- Complete birth chart generation
- Customizable form fields and styling
- Real-time API integration
- Responsive design
- Multi-language support

### 📅 Panchang Widget
- Daily astrological information
- Tithi, Nakshatra, Yoga, and Karana details
- Sunrise/sunset times
- Auspicious times display
- Modern card-based layout

### 💕 Kundali Matching
- Compatibility analysis between two people
- Ashtakoot scoring system
- Manglik analysis
- Planetary position comparison
- Detailed recommendations

## Installation

1. Copy the `jyotisham-astro-theme` folder to your Shopify app's `extensions` directory
2. Update the API endpoints and keys in the block settings
3. Deploy the extension to your Shopify app

## Usage

### Adding Blocks to Your Theme

#### Kundali Generator
```liquid
{% section 'kundali_generator' %}
```

#### Panchang Widget
```liquid
{% section 'panchang_widget' %}
```

#### Kundali Matching
```liquid
{% section 'kundali_matching' %}
```

### Customization

Each block comes with extensive customization options:

- **Colors**: Primary, secondary, accent, and text colors
- **Typography**: Font sizes for titles, subtitles, and content
- **Layout**: Padding, margins, border radius, and spacing
- **Features**: Toggle advanced options and additional features
- **API Settings**: Configure endpoints and authentication

### Snippets

The extension includes reusable snippets:

- `stars.liquid` - Star rating display
- `loading_spinner.liquid` - Loading animation
- `error_message.liquid` - Error message display

### Localization

Currently supports:
- English (en.default.json)
- Hindi (hi.json)

To add more languages, create new JSON files in the `locales` directory following the same structure.

## API Integration

### Required API Endpoints

1. **Kundali Generation**
   - Endpoint: `POST /api/kundali`
   - Required fields: name, gender, birth_date, birth_time, birth_place

2. **Panchang Data**
   - Endpoint: `POST /api/panchang`
   - Required fields: date, location, timezone

3. **Kundali Matching**
   - Endpoint: `POST /api/kundali-matching`
   - Required fields: person1_*, person2_* (name, gender, birth details)

### API Response Format

#### Kundali Response
```json
{
  "success": true,
  "kundali_data": "Generated Kundali content..."
}
```

#### Panchang Response
```json
{
  "success": true,
  "panchang_data": {
    "tithi": {
      "name": "Tithi Name",
      "description": "Tithi description"
    },
    "nakshatra": {
      "name": "Nakshatra Name",
      "description": "Nakshatra description"
    },
    "yoga": {
      "name": "Yoga Name",
      "description": "Yoga description"
    },
    "karana": {
      "name": "Karana Name",
      "description": "Karana description"
    },
    "sun_times": {
      "sunrise": "06:30 AM",
      "sunset": "06:30 PM"
    },
    "auspicious_times": [
      {
        "name": "Brahma Muhurta",
        "time": "04:30 AM - 05:30 AM"
      }
    ]
  }
}
```

#### Matching Response
```json
{
  "success": true,
  "matching_data": {
    "compatibility_score": 75,
    "ashtakoot_score": 28,
    "ashtakoot_description": "Good compatibility",
    "manglik_analysis": "Manglik analysis details",
    "planetary_positions": "Planetary position analysis",
    "recommendations": "Compatibility recommendations"
  }
}
```

## Configuration

### Block Settings

Each block can be configured through the Shopify theme editor with the following settings:

#### Common Settings
- Section title and subtitle
- Color scheme (primary, secondary, accent)
- Typography (font sizes)
- Layout (padding, margins, border radius)
- API configuration (endpoints, keys)

#### Advanced Settings
- Show/hide advanced options
- Custom CSS classes
- Responsive breakpoints
- Animation preferences

## Browser Support

- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+

## Responsive Design

The extension is fully responsive and includes:
- Mobile-first design approach
- Flexible grid layouts
- Touch-friendly interface
- Optimized for all screen sizes

## Accessibility

- WCAG 2.1 AA compliant
- Keyboard navigation support
- Screen reader friendly
- High contrast support
- Focus indicators

## Performance

- Optimized CSS and JavaScript
- Lazy loading for images
- Minimal external dependencies
- Efficient API calls
- Caching strategies

## Support

For support and questions:
- Check the documentation
- Review the API integration guide
- Contact the development team

## License

This extension is proprietary software. All rights reserved.

## Changelog

### Version 1.0.0
- Initial release
- Kundali Generator block
- Panchang Widget block
- Kundali Matching block
- Multi-language support
- Responsive design
- API integration
