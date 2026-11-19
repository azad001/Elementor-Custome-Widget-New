<div class="uts-all-banner">
    <h1><?php echo $settings['title'];?></h1>
    <p><?php echo $settings['desc'];?></p>
</div>

<style>
.uts-all-banner h1{
    width: 100%;
    min-height: 164px;
    border-radius: 10px;
    background-color: #fff;
    justify-content: center;
    line-height: 1;
    font-size: 62px;
    color: #025a8c;
    align-items: center;
    flex-wrap: wrap;
    display: flex;
    padding: 0;
    margin: 0;
    text-align: center;    
}
@media screen and (max-width: 1920px) {
    .uts-all-banner h1{
        min-height: 8.5416666666667vw;
        border-radius: .52083333333333vw;
        font-size: 3.2291666666667vw;
    }   
    .uts-all-banner p {
        margin: .65104166666667vw 0;
        font-size: 1.20625vw;
    }    
}
.uts-all-banner p {
    margin: 12.5px 0;
    font-weight: 600;
    line-height: 1.259;
    font-size: 27px;
    text-shadow: 1px 3px 6px #000;
    color: white;
    text-align: center;    
}
.uts-all-banner p strong {
    padding: 0 42px;
    font-weight: 700;
}
</style>