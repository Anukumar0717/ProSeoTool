@echo off
echo Building Next.js application for nvihan.com...
call npm run build

echo.
echo Build completed successfully!
echo.
echo To deploy to nvihan.com, follow these steps:
echo.
echo 1. Upload the .next, public, package.json, and package-lock.json files to your hosting provider
echo 2. Install dependencies on the server with: npm install --production
echo 3. Start the application with: npm start
echo.
echo If you're using a hosting service like Vercel or Netlify:
echo - Connect your repository to the service
echo - Configure the build command as 'npm run build'
echo - Set the output directory to '.next'
echo - Add your environment variables from .env.production
echo - Configure your custom domain as 'nvihan.com'
echo.
echo For DNS configuration:
echo 1. Add an A record pointing to your server IP
echo 2. Add a CNAME record for 'www' pointing to 'nvihan.com'
echo.
echo For more detailed instructions, please refer to DEPLOYMENT_GUIDE.md
echo.
echo Deployment guide completed!

pause 