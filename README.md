# ProSEOKit - Free SEO Tools Suite

ProSEOKit is a comprehensive collection of free SEO tools designed to help website owners, content creators, and digital marketers optimize their online presence. Our platform provides a wide range of tools for content analysis, SEO optimization, keyword research, technical SEO, and image optimization.

## Features

### Content Tools
- Plagiarism Checker
- Grammar Checker
- Article Rewriter
- Article Spinner
- Word Counter
- Text to HTML Converter

### SEO Analysis Tools
- SEO Analyzer
- Keyword Position Checker
- Keyword Density Checker
- Backlink Checker
- Domain Authority Checker
- Page Authority Checker
- Website Speed Test
- Mobile-Friendly Test

### Research Tools
- Keyword Research Tool
- Competitor Analysis
- SERP Checker
- Website Worth Calculator
- Link Price Calculator

### Technical SEO Tools
- XML Sitemap Generator
- Robots.txt Generator
- Meta Tags Analyzer
- Schema Markup Generator
- SSL Checker

### Image Tools
- Reverse Image Search
- Image Optimizer
- Alt Text Generator
- Image to Text (OCR)

## Getting Started

### Prerequisites
- Node.js 18.x or later
- npm 9.x or later

### Installation

1. Clone the repository:
\`\`\`bash
git clone https://github.com/yourusername/proseokit.git
cd proseokit
\`\`\`

2. Install dependencies:
\`\`\`bash
npm install
\`\`\`

3. Run the development server:
\`\`\`bash
npm run dev
\`\`\`

4. Open [http://localhost:3000](http://localhost:3000) in your browser to see the application.

## Deployment to nvihan.com

This project is configured to be deployed to the nvihan.com domain. Follow these steps to deploy:

### Using Vercel or Netlify (Recommended)

1. Connect your repository to Vercel or Netlify
2. Configure the build settings:
   - Build command: `npm run build`
   - Output directory: `.next`
3. Add environment variables from `.env.production`
4. Configure your custom domain as `nvihan.com`

### Manual Deployment

1. Build the application:
```bash
npm run build
```

2. Upload the following files to your hosting provider:
   - `.next` directory
   - `public` directory
   - `package.json`
   - `package-lock.json`

3. Install production dependencies on the server:
```bash
npm install --production
```

4. Start the application:
```bash
npm start
```

### DNS Configuration

1. Add an A record pointing to your server IP
2. Add a CNAME record for `www` pointing to `nvihan.com`

## Built With

- [Next.js](https://nextjs.org/) - The React framework for production
- [React](https://reactjs.org/) - A JavaScript library for building user interfaces
- [Tailwind CSS](https://tailwindcss.com/) - A utility-first CSS framework
- [TypeScript](https://www.typescriptlang.org/) - JavaScript with syntax for types

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request. 