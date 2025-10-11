// Validation script for Jyotisham Astro Theme Extension
const fs = require('fs');
const path = require('path');

const extensionPath = __dirname;

// Required files and directories
const requiredFiles = [
  'shopify.extension.toml',
  'blocks/kundali_generator.liquid',
  'blocks/panchang_widget.liquid',
  'blocks/kundali_matching.liquid',
  'snippets/stars.liquid',
  'snippets/loading_spinner.liquid',
  'snippets/error_message.liquid',
  'locales/en.default.json',
  'locales/hi.json',
  'assets/styles.css',
  'README.md'
];

// Required directories
const requiredDirs = [
  'blocks',
  'snippets',
  'locales',
  'assets'
];

console.log('🔍 Validating Jyotisham Astro Theme Extension...\n');

let isValid = true;
let errors = [];

// Check required directories
console.log('📁 Checking directories...');
requiredDirs.forEach(dir => {
  const dirPath = path.join(extensionPath, dir);
  if (!fs.existsSync(dirPath)) {
    errors.push(`Missing directory: ${dir}`);
    isValid = false;
  } else {
    console.log(`✅ ${dir}/`);
  }
});

// Check required files
console.log('\n📄 Checking files...');
requiredFiles.forEach(file => {
  const filePath = path.join(extensionPath, file);
  if (!fs.existsSync(filePath)) {
    errors.push(`Missing file: ${file}`);
    isValid = false;
  } else {
    console.log(`✅ ${file}`);
  }
});

// Validate shopify.extension.toml
console.log('\n⚙️ Validating shopify.extension.toml...');
try {
  const tomlContent = fs.readFileSync(path.join(extensionPath, 'shopify.extension.toml'), 'utf8');
  const requiredTomlFields = ['name', 'type', 'uid'];
  
  requiredTomlFields.forEach(field => {
    if (!tomlContent.includes(field)) {
      errors.push(`Missing field in shopify.extension.toml: ${field}`);
      isValid = false;
    }
  });
  
  if (tomlContent.includes('type = "theme"')) {
    console.log('✅ Extension type is correct (theme)');
  } else {
    errors.push('Extension type should be "theme"');
    isValid = false;
  }
} catch (error) {
  errors.push(`Error reading shopify.extension.toml: ${error.message}`);
  isValid = false;
}

// Validate Liquid files
console.log('\n🔧 Validating Liquid files...');
const liquidFiles = [
  'blocks/kundali_generator.liquid',
  'blocks/panchang_widget.liquid',
  'blocks/kundali_matching.liquid'
];

liquidFiles.forEach(file => {
  const filePath = path.join(extensionPath, file);
  try {
    const content = fs.readFileSync(filePath, 'utf8');
    
    // Check for required schema
    if (!content.includes('{% schema %}')) {
      errors.push(`Missing schema in ${file}`);
      isValid = false;
    } else {
      console.log(`✅ ${file} has schema`);
    }
    
    // Check for proper block structure
    if (!content.includes('{% comment %}') || !content.includes('{% endschema %}')) {
      errors.push(`Invalid block structure in ${file}`);
      isValid = false;
    }
  } catch (error) {
    errors.push(`Error reading ${file}: ${error.message}`);
    isValid = false;
  }
});

// Validate JSON files
console.log('\n📋 Validating JSON files...');
const jsonFiles = ['locales/en.default.json', 'locales/hi.json'];

jsonFiles.forEach(file => {
  const filePath = path.join(extensionPath, file);
  try {
    const content = fs.readFileSync(filePath, 'utf8');
    JSON.parse(content); // This will throw if invalid JSON
    console.log(`✅ ${file} is valid JSON`);
  } catch (error) {
    errors.push(`Invalid JSON in ${file}: ${error.message}`);
    isValid = false;
  }
});

// Summary
console.log('\n📊 Validation Summary:');
if (isValid) {
  console.log('🎉 Extension is valid and ready for deployment!');
  console.log('\n📦 Extension Structure:');
  console.log('├── shopify.extension.toml');
  console.log('├── blocks/');
  console.log('│   ├── kundali_generator.liquid');
  console.log('│   ├── panchang_widget.liquid');
  console.log('│   └── kundali_matching.liquid');
  console.log('├── snippets/');
  console.log('│   ├── stars.liquid');
  console.log('│   ├── loading_spinner.liquid');
  console.log('│   └── error_message.liquid');
  console.log('├── locales/');
  console.log('│   ├── en.default.json');
  console.log('│   └── hi.json');
  console.log('├── assets/');
  console.log('│   ├── styles.css');
  console.log('│   └── logo.png');
  console.log('└── README.md');
} else {
  console.log('❌ Extension validation failed!');
  console.log('\n🚨 Errors found:');
  errors.forEach(error => {
    console.log(`  • ${error}`);
  });
}

process.exit(isValid ? 0 : 1);
