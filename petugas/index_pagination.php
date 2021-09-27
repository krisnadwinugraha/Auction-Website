<ul class="pagination pagination-sm flex-wrap justify-content-sm-end">
				

<li class="page-item"><a class="page-link" href="?nohal=1">First</a></li>
					<li class="page-item <?php if($nohal <= 1){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($nohal <= 1){ echo '#'; } else { echo "?nohal=".($nohal - 1); } ?>">Prev</a>
					</li>
					<?php
						for($i=1;$i<=$jumhal;$i++)
						{
							$id=$i;
					?>
					<li id="<?php echo $id; ?>" class="page-item <?php if($nohal == $id){echo "active"; }; ?> <?php if($id != $nohal){echo "d-none"; }; ?>"><a class="page-link" href="?nohal=<?php echo $i; ?>"><?php echo $i; echo "/$jumhal";?></a></li>
					<?php
							
						}
					?>
					<li class="page-item <?php if($nohal >= $jumhal){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($nohal >= $jumhal){ echo '#'; } else { echo "?nohal=".($nohal + 1); } ?>">Next</a>
					</li>
					<li class="page-item"><a class="page-link" href="?nohal=<?php echo $jumhal; ?>">Last</a></li>
                 </ul>