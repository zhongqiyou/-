module.exports = {
    publicPath: process.env.NODE_ENV === 'production' ? './' : './',
    // outputDir: "dist",
    // assetsDir:"static",
    // indexPath:'index.html',
    devServer: {
        // host:"localhost" , 
        // port:8080 ,
        proxy: {
            "/wwsc": {
                target: "http://localhost:80/",
                ws: true,
                changeOrign: true,
            }
        }
    }
}