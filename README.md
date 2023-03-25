# GigaFile miner
## 概要
GigaFile便にアップロードされたファイルを総当りします

GigaFile便にはURL短縮機能があり、4~5文字のランダムな文字列を含んだURLが生成されます

その文字列を総当りし、ファイルが見つかれば教えてくれます
 ## 使い方
 requestsモジュールが必要です
 
 `$ pip install requests`
 
 あとは実行するだけ
 ```
 $ python gigafile_miner.py 
[+]collect!! --> https://**.gigafile.nu/****-********************************
[+]collect!! --> https://**.gigafile.nu/****-********************************
[+]collect!! --> https://**.gigafile.nu/****-********************************
[+]checking... [ D0FO ]
```
