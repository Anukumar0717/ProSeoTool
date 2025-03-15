# Deployment Guide for nvihan.com

This guide provides detailed instructions for deploying the ProSEOKit application to the nvihan.com domain.

## Deployment Options

### Option 1: Vercel (Recommended)

Vercel is the easiest way to deploy Next.js applications.

1. **Create a Vercel Account**
   - Sign up at [vercel.com](https://vercel.com)

2. **Connect Your Repository**
   - Import your GitHub, GitLab, or Bitbucket repository

3. **Configure Project Settings**
   - Build Command: `npm run build`
   - Output Directory: `.next`
   - Install Command: `npm install`
   - Development Command: `npm run dev`

4. **Environment Variables**
   - Add all variables from `.env.production`
   - Make sure to keep API keys secure

5. **Domain Configuration**
   - Go to Project Settings > Domains
   - Add your domain: `nvihan.com`
   - Add `www.nvihan.com` as well
   - Follow Vercel's instructions to verify domain ownership

6. **DNS Configuration**
   - Add the DNS records provided by Vercel
   - Typically includes:
     - An A record pointing to Vercel's IP
     - A CNAME record for `www` pointing to Vercel's domain

7. **Deploy**
   - Vercel will automatically deploy your application
   - Verify deployment at the domain verification page: `https://nvihan.com/domain-verification`

### Option 2: Manual Deployment

For more control, you can deploy manually to your own server.

1. **Server Requirements**
   - Node.js 18.x or later
   - npm 9.x or later
   - Nginx or Apache for reverse proxy

2. **Build the Application**
   ```bash
   npm run build
   ```

3. **Transfer Files**
   - Upload the following to your server:
     - `.next` directory
     - `public` directory
     - `package.json`
     - `package-lock.json`
     - `.env.production` (rename to `.env`)

4. **Install Dependencies**
   ```bash
   npm install --production
   ```

5. **Start the Application**
   - For testing:
     ```bash
     npm start
     ```
   - For production (using PM2):
     ```bash
     npm install -g pm2
     pm2 start npm --name "proseokit" -- start
     pm2 save
     pm2 startup
     ```

6. **Configure Nginx**
   ```nginx
   server {
       listen 80;
       server_name nvihan.com www.nvihan.com;

       location / {
           proxy_pass http://localhost:3000;
           proxy_http_version 1.1;
           proxy_set_header Upgrade $http_upgrade;
           proxy_set_header Connection 'upgrade';
           proxy_set_header Host $host;
           proxy_cache_bypass $http_upgrade;
       }
   }
   ```

7. **SSL Configuration**
   - Install Certbot
   - Run:
     ```bash
     certbot --nginx -d nvihan.com -d www.nvihan.com
     ```

8. **DNS Configuration**
   - Add an A record pointing to your server IP
   - Add a CNAME record for `www` pointing to `nvihan.com`

## Troubleshooting

### Common Issues

1. **Domain Not Resolving**
   - Check DNS propagation (can take up to 48 hours)
   - Verify DNS records are correct

2. **Application Not Loading**
   - Check server logs: `pm2 logs`
   - Verify environment variables are set correctly

3. **SSL Certificate Issues**
   - Ensure ports 80 and 443 are open
   - Check Certbot logs

4. **API Errors**
   - Verify API keys in environment variables
   - Check CORS settings if applicable

## Verification

After deployment, visit `https://nvihan.com/domain-verification` to confirm the application is running correctly on the nvihan.com domain.

## Support

If you encounter any issues during deployment, please:
1. Check the server logs
2. Review this guide for any missed steps
3. Contact support if problems persist 