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
[*] [ **** ] discover!! --> https://**.gigafile.nu/****-********************************
[*] [ **** ] discover!! --> https://**.gigafile.nu/****-********************************
[*] [ **** ] discover!! --> https://**.gigafile.nu/****-********************************
[*] [ **** ] discover!! --> https://**.gigafile.nu/****-********************************
[+] [ **** ] mining...
```
## 備考
デフォルトでは4~5文字の文字列を生成しますが、5文字のURLが見つかる確率は単純計算で4文字の62倍です

そこで、`string = rand_str(rand_num)`の引数を4にすれば、4文字のURLのみに絞られますが効率的に探すことができます